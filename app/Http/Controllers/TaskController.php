<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            // Add any other validation rules as needed
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $task = Task::findOrFail($id);
            return view('tasks.show', compact('task'));
        } catch (\Exception $e) {
            return redirect()->route('tasks.index')->with('error', 'Task not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::find($id);
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::find($id);

        if ($task) {
            $task->update($request->all());
            return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
        } else {
            return redirect()->route('tasks.index')->with('error', 'Task not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $task = Task::findOrFail($id);
            $task->delete();
            return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('tasks.index')->with('error', 'Task not found');
        }
    }
}
