@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifica post</h1>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
     
            <div class="form-group">
                <label for="title">Titolo</label>
                <input class="form-control" type="text" id="title" name="title" value="{{ $post->title }}">
            </div>
     
            <div class="form-group">
                <label for="body">Testo</label>
                <textarea class="form-control" rows="10" id="body" name="body">{{ $post->body }}</textarea>
            </div>
            
            <div class="form-group custom-file col-4">
                <label class="my-2 custom-file-label" for="img_path">Immagine principale del post</label>
                <img src="{{ asset('storage/' . $post->img_path) }}" style="width: 200px; margin-top: 80px">
                 <input type="file" class="form-control my-4 custom-file-input" id="img_path" name="img_path" accept="image/*">
            </div>

             <input type="submit" value="Modifica" class="btn btn-primary d-block">
        </form>
    </div>
@endsection
