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
        
        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
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
     
             <input type="submit" value="salva" class="btn btn-primary">
        </form>
    </div>
@endsection
