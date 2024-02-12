<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'user_id' => 'required|exists:users,id' // Validate that the user_id exists in the users table

        ]);

        Post::create($request->all());

        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $post = Post::findOrFail($id);
            return view('posts.show', compact('post'));
        } catch (\Exception $e) {
            return redirect()->route('posts.index')->with('error', 'Post not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);

        if ($post) {
            $post->update($request->all());
            return redirect()->route('posts.index')->with('success', 'Post updated successfully');
        } else {
            return redirect()->route('posts.index')->with('error', 'Post not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $post = Post::findOrFail($id);
            $post->delete();
            return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('posts.index')->with('error', 'Post not found');
        }
    }
}
