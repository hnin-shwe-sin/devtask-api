<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    public function store(Request $request)
    {
        $validated = $this->formData($request);

        Task::create($validated);
        return response()->json([
            'success' => true,
            'message' => 'Task Stored Successfully!'
        ], 201);
    }

    public function show(string $id)
    {
        $task = Task::findOrFail($id);
        return response()->json($task);
    }

    public function update(Request $request, string $id)
    {
        $task = Task::findOrFail($id);
        $validated = $this->formData($request);
        $task->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Task Updated Successfully!',
            'data' => $task
        ]);
    }

    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json([
            'success' => true,
            'message' => 'Task Delete Successfully!'
        ]);
    }

    private function formData(Request $request)
    {
        $validatedFormData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        return $validatedFormData;
    }
}
