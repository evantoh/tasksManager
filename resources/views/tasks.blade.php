@extends('layouts.app')

@section('content')

<!-- Page Title -->
<h2 class="text-center mb-4">Task Management Asana</h2>

<!-- Table Container for Responsive Design -->
<div class="table-container">
    <!-- Responsive Task List Table -->
    <div class="table-responsive">
        @if($tasks)
            <!-- Task List Table with Bootstrap Styling -->
            <table class="table table-bordered table-hover task-table">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Resource Type</th>
                        <th>Resource Sub Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <!-- Displaying Task Details in Rows -->
                        <tr>
                            <td>{{ $task['gid'] }}</td>
                            <td>{{ $task['name'] }}</td>
                            <td>{{ $task['resource_type'] }}</td>
                            <td>{{ $task['resource_subtype'] }}</td>
                            <td>
                                <!-- Details Button with Link to Task Details Page -->
                                <a href="{{ route('tasks.detailsFromAsana', ['id' => $task['gid']]) }}" class="btn btn-info btn-sm btn-details">Details</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Back to Task List Button -->
            <a class="nav-link btn btn-secondary mt-3" href="{{ route('tasks.listallTasks') }}">Back to Task List</a>
        @else
            <!-- Displayed when No Tasks are Available -->
            <p class="text-center">No tasks available.</p>
        @endif
    </div>
</div>

@endsection

@section('styles')
    <style>
        /* Responsive Table Container Styles */
        .table-container {
            max-width: 100%;
            overflow-x: auto;
        }

        /* Details Button Styles */
        .btn-details {
            background-color: #007bff;
            color: #fff;
        }

        .btn-details:hover {
            background-color: #0056b3;
        }
    </style>
@endsection
