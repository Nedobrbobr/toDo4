<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function add(Request $request)
    {
        $user_id = $request->user()->id;
        $title = $request->input('title');
        $description = $request->input('description');
        $new_task = new Task;
        $new_task->user_id = $user_id;
        $new_task->title = $title;
        $new_task->description = $description;
        $new_task->save();

        return redirect()->back();
      }

    public function list(Request $request)
    {
        $user_id = $request->user()->id;
        $tasks = Task::where('user_id', $user_id);
        $tasks_active = $tasks->where('completed', false)->simplePaginate(7);

        return view('task-list', compact('tasks_active'));
    }

    public function list_completed(Request $request)
    {
        $user_id = $request->user()->id;
        $tasks = Task::where('user_id', $user_id);
        $tasks_completed = $tasks->where('completed', true)->simplePaginate(7);

        return view('task-list-completed', compact( 'tasks_completed'));
    }

    public function complete(Request $request)
    {
        $task = Task::where('id', $request->input('task_id'))->first();
        $task->completed = ! $task->completed;
        $task->save();

        return redirect()->back();
    }
}
