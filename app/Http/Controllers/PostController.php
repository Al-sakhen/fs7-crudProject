<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'status' => ['required', 'in:active,inactive'],
            'image' => ['image', 'mimes:png,jpg,jpeg']
        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('posts_images');
        }

        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'status' => $request->status,
            'image' => $path ?? null
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
            'status' => ['required', 'in:active,inactive'],
            'image' => ['nullable' , 'mimes:png,jpg,jpeg']
        ]);
        $post = Post::findOrFail($id);
        $old_image = $post->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $new_image = $image->store('posts_images');
        }
        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'status' => $request->status,
            'image' => $new_image ?? $old_image
        ]);

        // delete old image if the post has new image
        if($old_image && $request->hasFile('image')){
            Storage::delete($old_image);
        }
        return redirect('/posts')->with('success', 'Post updated successfully');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        if($post->image){
            Storage::delete($post->image);
        }

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
