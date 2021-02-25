@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titolo</th>
                    <th>Data creazione</th>
                    <th colspan="3"></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->created_at->format('d-m-Y') }}</td>
                        <td style="text-align: center;">
                            <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}" class="btn btn-outline-dark">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}" class="btn btn-outline-dark">
                                <i class="far fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="POST" style="display: inline-block;">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-dark"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection