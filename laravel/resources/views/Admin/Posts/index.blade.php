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
                        <td>{{ $post->titolo }}</td>
                        <td>{{ $post->created_at->format('d-m-Y') }}</td>
                        <td>{{ $post->id }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection