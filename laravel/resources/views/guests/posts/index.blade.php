@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Il mio Blog</h1>
            <div class="row">
                @foreach ($posts as $post)           
                    <div class="card col-3 m-4">
                        <img class="card-img-top" src="{{ $post->img_path ? asset('storage/' . $post->img_path) : asset('images/placeholder.jpg') }}" alt="{{ $post->title }}">
                        <div class="card-body">
                            <h2>{{ $post->title }}</h2>
                        </div>
                        <div class="card-footer">
                            <small class="d-block">{{ $post->user->name }} - {{ $post->created_at->format('d-m-Y') }}</small>
                            <a href="{{ route('posts.show', $post->slug) }}">Leggi</a>
                        </div>
                    </div>
                @endforeach
            </div>
    </div>
@endsection