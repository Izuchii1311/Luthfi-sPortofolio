<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(6);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'title' => 'required|min:3|max:100',
            'image' => 'mimes:png,jpg,jpeg|max:5120',   // max: 5 Mb
            'body' => 'required'
        ]);
        $validated['slug'] = Str::slug($request->title);

        if (request()->file('image')) {
            $validated['image'] = request()->file('image')->store('image/posts');
        } else {
            $validated['image'] = null;
        }

        // $uploadImage = request()->file('image') ? request()->file('image')->store('image/posts') : null;
        // $validated['image'] = $uploadImage;

        Post::create($validated);
        session()->flash('success', "Created New Post Successfully");
        session()->flash('error', "Created New Data Failed");

        return redirect('/posts');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        // dd($request);
        $validated = $request->validate([
            'title' => 'required|min:3|max:100',
            'image' => 'mimes:png,jpg,jpeg|max:5120',  // max: 5 Mb
            'body' => 'required'
        ]);

        if (request()->file('image')) {
            $validated['image'] = request()->file('image')->store('image/posts');
            if($post->image) {
                Storage::delete($post->image);
            }
        } else {
            $validated['image'] = $post->image;
        }

        $post->update($validated);
        session()->flash('success', "Edited Post Successfully");
        session()->flash('error', "Edited Post Failed");

        return redirect('/posts');
    }

    public function destroy(Post $post)
    {
        Storage::delete($post->image);
        $post->delete();
        session()->flash('success', "Delete Post Successfully");
        session()->flash('error', "Delete Post Failed");

        return redirect('/posts');
    }
}
