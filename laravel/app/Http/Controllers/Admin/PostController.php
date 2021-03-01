<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Mail\BlogMail;
use Illuminate\Support\Facades\Mail;


class PostController extends Controller
{
    private $postValidation = [
        'title' => 'required|max:100',
        'body' => 'required',
        'img_path' => 'image'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('user_id', Auth::id())->get();

        return view('admin.posts.index' , compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'admin.posts.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $request->validate($this->postValidation);

        $newPost = New Post();

        $data['slug'] = Str::slug($data['title']);
        $data['user_id'] = Auth::id();

        if (!empty($data['img_path'])) {
            $data['img_path'] = Storage::disk('public')->put('images',$data['img_path']);
        }

        $newPost->fill($data); // fillable nel model
        $saved = $newPost->save();

        if ($saved) {
            Mail::to('pippo@mail.it')->send(new BlogMail($newPost));

            return redirect()
                ->route("admin.posts.index")
                ->with("message", "Post " . $newPost->title. " creato correttamente!");
        } else {
            return redirect()
                ->route("admin.posts.index")
                ->with("message" , "Errore nel salvataggio");
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        $post->update($data);

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
