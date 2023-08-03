@extends('layouts.main_layouts', ['title' => 'Edit post'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h4>Edit post.</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('posts.update', $post->slug) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title Post</label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $post->title }}">
                            @error('title')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Upload a new Image</label>
                            <br>
                            <div>
                                <small class="text-secondary">Latest Image</small>
                            </div>
                            <img src="{{ asset('/storage/' . $post->image) }}" class="card-img-top mb-2" style="width: 300px">
                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" value="{{ $post->image }}">
                            @error('image')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="body" class="form-label">Content</label>
                            <input type="textarea" name="body" id="body" class="form-control @error('body') is-invalid @enderror"  value="{{ $post->body }}">
                            @error('body')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-primary">Kembali</a>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection