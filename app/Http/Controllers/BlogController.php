<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'description' => 'required',
            'user_id' => 'required|exists:users,id' // Validate that the user_id exists in the users table
        ]);

        Blog::create($request->all());

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $blog = Blog::findOrFail($id);
            return view('blogs.show', compact('blog'));
        } catch (\Exception $e) {
            return redirect()->route('blogs.index')->with('error', 'Blog not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::find($id);
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blog = Blog::find($id);

        if ($blog) {
            $blog->update($request->all());
            return redirect()->route('blogs.index')->with('success', 'Blog updated successfully');
        } else {
            return redirect()->route('blogs.index')->with('error', 'Blog not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $blog = Blog::findOrFail($id);
            $blog->delete();
            return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('blogs.index')->with('error', 'Blog not found');
        }
    }
}
