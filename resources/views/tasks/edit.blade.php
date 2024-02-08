@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <!-- Form Title -->
            <h5 class="card-title text-center mb-4">Edit Task</h5>
            <!-- Task Edit Form -->
            <form action="{{ route('tasks.update', $task->id) }}" method="post">
                @csrf
                @method('put')

                <!-- Task Title Input -->
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}" required>
                </div>

                <!-- Task Description Textarea -->
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="4">{{ $task->description }}</textarea>
                </div>

                <!-- Form Row for Due Date and Status -->
                <div class="form-row">
                    <!-- Due Date Input -->
                    <div class="form-group col-md-6">
                        <label for="duedate">Due Date:</label>
                        <input type="date" class="form-control" id="duedate" name="duedate" value="{{ $task->duedate }}">
                    </div>
                    <!-- Status Dropdown -->
                    <div class="form-group col-md-6">
                        <label for="status">Status:</label>
                        <select class="form-control" id="status" name="status">
                            <!-- Loop through status options -->
                            @foreach (['to do' => 'To Do', 'in progress' => 'In Progress', 'done' => 'Done'] as $key => $value)
                                <option value="{{ $key }}" {{ $task->status === $key ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Form Row for Assignee and Priority -->
                <div class="form-row">
                    <!-- Assignee Dropdown -->
                    <div class="form-group col-md-6">
                        <label for="assignee_id">Assignee:</label>
                        <select class="form-control" id="assignee_id" name="assignee_id">
                            <option value="">Unassigned</option>
                            <!-- Loop through assignee options -->
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $task->assignee_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Priority Dropdown -->
                    <div class="form-group col-md-6">
                        <label for="priority">Priority:</label>
                        <select class="form-control" id="priority" name="priority">
                            <!-- Loop through priority options -->
                            @foreach (['high' => 'High', 'medium' => 'Medium', 'low' => 'Low'] as $key => $value)
                                <option value="{{ $key }}" {{ $task->priority === $key ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Form Submission Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update Task</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
