@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Task creation form -->
        <form id="task-form" action="{{ route('tasks.store') }}" method="post">
            @csrf <!-- CSRF protection -->

            <!-- Include partials -->
            @include('partials.createTask._form_title') <!-- Include title form partial -->
            @include('partials.createTask._form_description') <!-- Include description form partial -->
            @include('partials.createTask._form_due_date') <!-- Include due date form partial -->
            @include('partials.createTask._form_status') <!-- Include status form partial -->

            <!-- Assignee Section -->
            @if (isset($task) && $task->assignee)
                <!-- If assignee is set, display their name -->
                <div class="form-group">
                    <label for="assignee_id">Assignee:</label>
                    <span>{{ $task->assignee->name }}</span>
                </div>
            @else
                <!-- If no assignee selected, display message -->
                <p>No assignee selected.</p>
            @endif

            <!-- Select dropdown to choose assignee -->
            <label for="assignee_id">Assignee:</label>
            <select name="assignee_id">
                <option value="">Unassigned</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ isset($task) && $task->assignee_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>

            <!-- Include priority form partial -->
            @include('partials.createTask._form_priority')

            <!-- Include submit button form partial -->
            @include('partials.createTask._form_submit')
        </form>
    </div>
@endsection

@section('styles')
    <!-- Reference the external CSS file -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/createTasks.css') }}">
@endsection
