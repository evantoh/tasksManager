@extends('layouts.app')  <!-- Extend the 'layouts.app' layout -->

@section('title', 'Overdue Tasks')  <!-- Set the title for this page -->

@section('content')
    <!-- Main content section -->

    <h1>Overdue Tasks</h1>  <!-- Heading for the page -->

    @if ($overdueTasks->isEmpty())
        <!-- Displayed when no overdue tasks are found -->
        <p>No overdue tasks found.</p>
    @else
        <!-- List of overdue tasks -->
        <ul class="task-list overdue-task-list">
            @foreach ($overdueTasks as $task)
                <li>
                    <!-- Task Details -->
                    <span>{{ $task->title }}</span>
                    <span>{{ $task->description }}</span>
                    <span>{{ $task->duedate }}</span>
                    <span>{{ $task->status }}</span>

                    <!-- Link to view task details -->
                    <a href="{{ route('tasks.show', $task->id) }}">Details</a>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
