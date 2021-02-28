@extends('layouts.app')

@section('content')
    <div class="container">
        @if (!empty($post->img_path))
            <img class="img-fluid" src="{{ asset('storage/' . $post->img_path) }}" alt="{{ $post->title }}">
        @else
            <img class="img-fluid" src="{{ asset('images/placeholder.jpg') }}" alt="{{ $post->title }}">
        @endif
        <h1 class="my-3 d-inline-block" >{{ $post->title }}</h1>
        <small style="float: right" class="p-2">{{ $post->user->name }} - {{ $post->created_at->format('d-m-Y') }}</small>
        <p>{{ $post->body }}</p>
    </div>
@endsection