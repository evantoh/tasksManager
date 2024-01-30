<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Carbon\Carbon; // In-built date library
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class TaskController extends Controller
{
    // Function to list all tasks
    public function listAllTasks()
    {
        // Get all tasks from the Task model
        $tasks = Task::all();
        return view('tasks.listAllTasks', compact('tasks'));
    }

    // Function to create tasks
    public function create()
    {
        $users = User::all();

        return view('tasks.create', compact('users'));


        // return view('tasks.create');
    }

    // Function to store tasks and add validation for some fields making them required
    public function store(Request $request)
        {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'duedate' => 'required',
                'status' => 'required',
                'assignee_id' => 'nullable|exists:users,id',

            ]);

            Task::create($request->all());

            return redirect('/dashboard')->with('success', 'Task created successfully!');
        }

    // Show tasks
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    // Edit specific tasks by id
    public function edit(Task $task)
    {
        $users = User::all();

        return view('tasks.edit', compact('task','users'));
    }

    // Update task after editing
    public function update(Request $request, Task $task)
    {
        // Validation rules for task update
        $request->validate([
            'title' => 'required',
            'description' => 'nullable|string',
            'duedate' => 'nullable|date',
            'status' => 'nullable|in:to do,in progress,done',
            'assignee_id' => 'nullable|exists:users,id',


        ]);

        // Convert date strings to Carbon objects
        $request['duedate'] = $request['duedate'] ? Carbon::parse($request['duedate']) : null;

        // Update the task with the provided data
        $task->update($request->all());

        return redirect('/dashboard')->with('success', 'Task updated successfully!');
    }

    // Delete task
    public function destroy(Task $task)
    {
        // Delete the specified task
        $task->delete();

        return redirect('/tasks')->with('success', 'Task deleted successfully!');
    }

    // Get and display tasks which are overdue
    public function overdue()
    {
        // Retrieve tasks where duedate is in the past
        $overdueTasks = Task::where('duedate', '<', now())->get();
        return view('tasks.overdue', compact('overdueTasks'));
    }
}
