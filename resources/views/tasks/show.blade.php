@extends('layouts.app')

@section('content')



<header>
    <p>Task Details</p>
</header>

<main>
    <div class="task-details">
        <p><strong>Title:</strong> {{ $task->title }}</p>
        <p><strong>Description:</strong> {{ $task->description }}</p>
        <p><strong>Due Date:</strong> {{ $task->duedate }}</p>
        <p><strong>Status:</strong> {{ $task->status }}</p>
        <p><strong>Assignee:</strong> {{ $task->assignee ? $task->assignee->name : 'Unassigned' }}</p>
        <p><strong>Priority:</strong> {{ $task->priority }}</p>
    </div>

    <!-- Button to edit the task -->
    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit Task</a>

    <!-- Form for deleting the task -->
    <form action="{{ route('tasks.destroy', $task->id) }}" method="post" style="display:inline;">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Delete Task</button>
    </form>

    <!-- Link to go back to Task List -->
    <a href="{{ route('tasks.listallTasks') }}" class="btn btn-secondary">Back to Task List</a>
</main>
<link rel="stylesheet" href="{{ asset('css/show.css') }}">


@endsection
