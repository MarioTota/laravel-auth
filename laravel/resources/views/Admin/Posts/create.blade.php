@extends('layouts.app')

@section('content')
   <h1>Tutti i post</h1>

   <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf
        @method('POST')

        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="button" value="">
        </div>
   </form>
@endsection