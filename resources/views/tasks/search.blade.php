@extends('layouts.app')

@section('content')
    <main>
        <!-- Search Form -->
        <div class="search-form">
            <!-- Form for searching tasks -->
            <form action="{{ route('tasks.search') }}" method="GET">
                @csrf
                <input type="text" name="query" placeholder="Search tasks...">
                <button type="submit">Search</button>
            </form>
        </div>

        <!-- Task List -->
        <ul class="task-list">
            <!-- Displaying each task in the list -->
            @forelse($tasks as $task)
                <li>
                    <!-- Task Details -->
                    <div class="task-details">
                        <p><strong>Title:</strong> {{ $task->title }}</p>
                        <p><strong>Description:</strong> {{ $task->description }}</p>
                        <p><strong>Due Date:</strong> {{ $task->duedate }}</p>
                        <p><strong>Status:</strong> {{ $task->status }}</p>
                        <!-- Checking for assignee and displaying assignee's name -->
                        <p><strong>Assignee:</strong> {{ $task->assignee ? $task->assignee->name : 'Unassigned' }}</p>
                        <p><strong>Priority:</strong> {{ $task->priority }}</p>
                    </div>
                    <!-- Link to view task details -->
                    <a href="{{ route('tasks.show', $task->id) }}" class="btn">Details</a>
                </li>
            @empty
                <!-- Displayed when no tasks are found -->
                <li>No tasks found.</li>
            @endforelse
        </ul>

        <!-- Actions -->
        <div class="actions">
            <!-- Links for creating task and viewing tasks from Asana -->
            <a href="{{ route('tasks.create') }}" class="btn">Create Task</a>
            <a href="{{ route('tasks.fetchAsanaTasks') }}" class="btn">View Tasks Asana</a>
        </div>
    </main>
@endsection
