@extends('layouts.app')

@section('content')

    <!-- Main content section -->
    <main>
        <div>
            <!-- Search form -->
            <form action="{{ route('tasks.search') }}" method="GET" class="search-form">
                <input type="text" name="query" placeholder="Search tasks by title, description, due date, and status..." class="search-input">
                <button type="submit" class="search-button">Search</button>
            </form>
        </div>

        <!-- Task list -->
        <ul class="task-list">
            @forelse ($tasks as $task)
            <li>
                <div class="task-details">
                    <p><strong>Title:</strong> {{ $task->title }}</p>
                    <p><strong>Description:</strong> {{ $task->description }}</p>
                    <p><strong>Due Date:</strong> {{ $task->duedate }}</p>
                    <p><strong>Status:</strong> {{ $task->status }}</p>
                    <p><strong>Assignee:</strong> {{ $task->assignee ? $task->assignee->name : 'Unassigned' }}</p>
                    <p><strong>Priority:</strong> {{ $task->priority }}</p>
                </div>
                <a href="{{ route('tasks.show', $task->id) }}" class="createtasks">Details</a>
            </li>
            @empty
            <li>No tasks found.</li>
            @endforelse
        </ul>

        <!-- Buttons -->
        <a href="{{ route('tasks.create') }}" class="createtasks">Create Task</a>
        <a href="{{ route('tasks.fetchAsanaTasks') }}" class="createtasks">View Tasks Asana</a>
    </main>
    <link rel="stylesheet" href="{{ asset('css/listAllTasks.css') }}">

@endsection
