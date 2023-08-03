@extends('layouts.main_layouts', ['title' => 'All Posts'])

@section('content')
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-8">
                <h2>Posts Page</h2>
            </div>
            <div class="col-md-4">
                @include('partials.alert')
            </div>
        </div>

        <hr>

        <div class="row d-flex justify-content-end ">
            <div class="col">
                <a href="{{ route('posts.create') }}" class="btn btn-primary">New Post +</a>
            </div>
        </div>

        <div class="row">
            @forelse ($posts as $post)
                <div class="col-md-4">
                    <div class="card my-3">
                        <div class="card-body">
                            @if ($post->image)
                            <img src="{{ asset('/storage/' . $post->image) }}" class="card-img-top">
                            @endif
                            <h6 class="card-title mt-2">{{ $post->title }}</h6>
                            <div class="text-secondary">
                                <small>Dibuat pada {{ $post->created_at->format('d M, Y') }}</small>
                            </div>
                            <hr>
                            <p class="card-text">{{  Str::limit(nl2br($post->body), '100', '.') }} <a href="{{ route('posts.show', $post->slug) }}">Read more...</a></p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-6 mt-5">
                    <div class="alert alert-info">There's no posts.</div>
                </div>
            @endforelse
        </div>

        {{ $posts->links() }}
    </div>
@endsection
