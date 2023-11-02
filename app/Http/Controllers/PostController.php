<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Actions (functions) that will be executed when a request is sent to the route
    // any action must return response => [view, json, redirect, file ...]
    // actions usually be => [index , create , store , show , edit , update , destroy]

    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:100|string',
            'body' => ['required', 'min:10'],
            'status' => ['required', 'in:active,inactive']
        ]);


        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'status' => $request->status
        ]);

        return redirect('/posts')->with('success', 'Post created successfully');
    }

    public function show($id)
    {
        // 
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:3|max:100|string',
            'body' => ['required', 'min:10'],
            'status' => ['required', 'in:active,inactive']
        ]);

        $post = Post::findOrFail($id);

        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'status' => $request->status
        ]);

        return redirect('/posts')->with('success', 'Post updated successfully');
    }

    public function destroy($id)
    {
        // Post::find($id);
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('/posts')->with('success', 'Post deleted successfully');
    }

    public function toggleStatus($id)
    {
        $post = Post::findOrFail($id);

        $post->update([
            'status' => $post->status == 'active' ? 'inactive' : 'active'
        ]);

        return redirect('/posts')->with('success', 'Post status updated successfully');
    }
}
