<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = [
            [
                "id" => 1,
                "title" => "Learn Laravel",
                "description" => "Practice API"
            ],
            [
                "id" => 2,
                "title" => "Learn React",
                "description" => "Practice Axios"
            ]
        ];
        return response()->json($tasks);
    }

    public function show(string $id)
    {
        $tasks = [
            [
                "id" => 1,
                "title" => "Learn Laravel",
                "description" => "Practice API"
            ],
            [
                "id" => 2,
                "title" => "Learn React",
                "description" => "Practice Axios"
            ]
        ];

        foreach ($tasks as $task) {
            if ($task['id'] === (int)$id) {
                return response()->json($task);
            }
        }

        return response()->json([
            'success' => false,
            'message' => 'There is no match id',
        ], 404);
    }
}
