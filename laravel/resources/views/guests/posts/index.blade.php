@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Il mio Blog</h1>
        @foreach ($posts as $post)           
        <div class="card my-4">
            <div class="card-header">
                <h2>{{ $post->title }}</h2>
                <small>{{ $post->user->name }}</small>
            </div>
            <div class="card-body">
                {{ $post->body }}
            </div>
        </div>
        @endforeach
    </div>
@endsection