@extends('layouts.main_layouts', ['title' => "Content"])

@section('content')
    <h1>{{ $post->title }}</h1>
    <div class="d-flex justify-content-between">
        <small class="text-secondary mt-2">Published {{ $post->created_at }}</small>
        <div class="d-flex">
            <a href="{{ route('posts.edit', $post->slug) }}" class="btn btn-warning mx-2 text-white">Edit</a>
            <form action="{{ route('posts.delete', $post->slug) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
    <hr>
    <img src="{{ asset('/storage/' . $post->image) }}" alt="" style="width: 500px;">
    <p>{{ $post->body }}</p>

    <a href="{{ route('posts.index') }}" class="btn btn-primary">Kembali</a>
@endsection