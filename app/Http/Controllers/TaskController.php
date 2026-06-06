<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks', compact('tasks'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|max:10|min:3',
        ]);

        $task = new Task();
        $task->name = $request->name;
        $task->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        Task::find($id)->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
        $task = Task::find($id);
        $tasks = Task::all();
        return view('tasks', compact('task', 'tasks'));
    }

    public function update(Request $request)
    {
        $task = Task::find($request->id);
        $task->name = $request->name;
        $task->save();

        return redirect('tasks');
    }
}
