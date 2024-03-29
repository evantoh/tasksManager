<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Carbon\Carbon; // In-built date library
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\TaskRequest;



class TaskController extends Controller
{
    // Function to list all tasks
    public function listAllTasks()
    {
        // Get the ID of the logged-in user
         $userId = auth()->id();
        //  dd($userId);

        // Get tasks assigned to the logged-in user from the Task model
        $tasks = Task::where('assignee_id', $userId)->get();
        // dd($tasks);

        // Get all tasks from the Task model
        // $tasks = Task::all();
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
    public function store(TaskRequest $request)
    {
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
    public function update(TaskRequest $request, Task $task)
    {
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

        return redirect('/dashboard')->with('success', 'Task deleted successfully!');
    }

    // Get and display tasks which are overdue
    public function overdue()
    {
        // Retrieve tasks where duedate is in the past
        $overdueTasks = Task::where('duedate', '<', now())->get();
        return view('tasks.overdue', compact('overdueTasks'));
    }

    //function to search
    public function search(Request $request)
    {
        $query = $request->input('query');
        
        $tasks = Task::where('title', 'LIKE', "%$query%")
                    ->orWhere('description', 'LIKE', "%$query%")
                    ->orWhere('duedate', 'LIKE', "%$query%")
                    ->orWhere('status', 'LIKE', "%$query%")
                    ->get();
        
        return view('tasks.listAllTasks', compact('tasks'));
    }
}
