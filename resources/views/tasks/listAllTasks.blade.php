@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Main content section -->
    <div>
        <!-- Updated search form with new styles -->
        <form action="{{ route('tasks.search') }}" method="GET" class="custom-search-form">
            <input type="text" name="query" placeholder="Search tasks by title, description, due date, and status..." class="custom-search-input">
            <button type="submit" id="custom-search-button">Search</button>
        </form>
    </div>

    <!-- Display each task in a separate section -->
    @if (!empty($tasks))
        @foreach ($tasks as $task)
            <section class="custom-task-section">
                <div class="custom-task-details">
                    <p><strong>Title:</strong> {{ htmlspecialchars($task->title) }}</p>
                    <p><strong>Description:</strong> {{ htmlspecialchars($task->description) }}</p>
                    <p><strong>Due Date:</strong> {{ htmlspecialchars($task->duedate) }}</p>
                    <p><strong>Status:</strong> {{ htmlspecialchars($task->status) }}</p>
                    <p><strong>Assignee:</strong> {{ $task->assignee ? $task->assignee->name : 'Unassigned' }}</p>
                    <p><strong>Priority:</strong> {{ htmlspecialchars($task->priority) }}</p>
                </div>
                <a href="{{ route('tasks.show', $task->id) }}" class="custom-btn">Details</a>
            </section>
        @endforeach
    @else
        <p>No tasks found.</p>
    @endif

    <a href="{{ route('tasks.create') }}" class="custom-btn">Create Task</a>
    <a href="{{ route('tasks.fetchAsanaTasks') }}" class="custom-btn">View Tasks Asana</a>
</div>
@endsection

@section('styles')
    <!-- Reference the external CSS file -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/listAllTasks.css') }}">
@endsection
