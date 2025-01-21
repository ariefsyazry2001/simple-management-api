<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // View
    public function index()
    {
        return view('tasks.index');
    }

    // Fetch 
    public function fetchTasks()
    {
        return response()->json(Task::all()->map(function ($task) {
            $task->deadline = $task->deadline ? $task->deadline->format('Y-m-d') : null;
            return $task;
        }));
    }

    // Show 
    public function show(Task $task)
    {
        return response()->json($task);
    }

    // Create 
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:New,In Progress,Completed',
            'deadline' => 'nullable|date',
        ]);

        $task = Task::create($validated);

        return response()->json($task, 201);
    }

    // Update 
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:New,In Progress,Completed',
            'deadline' => 'nullable|date',
        ]);

        $task->update($validated);

        return response()->json($task);
    }

    // Delete 
    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json(null, 204);
    }
}

