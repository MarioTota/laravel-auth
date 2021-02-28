@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dettaglio post</h1>
    <table class="table table-striped table-bordered">
        @foreach ($post->getAttributes() as $key => $value)
            <tr>
                <td><strong>{{ $key }}</strong></td>
                <td>{{ $value }}</td>
            </tr>
        @endforeach
        <td>
            @if (!empty($post->img_path))
                <img style="width: 150px" src="{{ asset('storage/' . $post->img_path) }}" alt="{{ $post->title }}">
            @else 
                <img style="width: 150px" src="{{ asset('images/placeholder.jpg') }}" alt="{{ $post->title }}">
            @endif
        </td>
    </table>
</div>
@endsection
