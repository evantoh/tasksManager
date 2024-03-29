
@extends('layouts.app')

@section('content')

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            background-color: #f8f9fa;  /* Set background color */
            color: #343a40;  /* Set text color */
        }

        /* Container Margin */
        .container {
            margin-top: 50px;  /* Add top margin to the container */
        }

        /* Navbar Styles */
        .navbar {
            background-color: #007bff;  /* Set navbar background color */
        }

        .navbar-dark .navbar-toggler-icon {
            background-color: #fff;  /* Set color for the navbar toggler icon */
        }

        .navbar-brand, .navbar-nav .nav-link {
            color: #fff;  /* Set text color for navbar links */
        }

        /* Card Styles */
        .card {
            background-color: #fff;  /* Set card background color */
            border: 1px solid rgba(0, 0, 0, 0.125);  /* Set card border */
            border-radius: 0.25rem;  /* Set border radius */
        }

        /* Card Body Padding */
        .card-body {
            padding: 20px;  /* Set padding for card body */
        }
    </style>
</head>
<body>

<!-- Main Content Container -->
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <!-- Task Details Heading -->
            <h2 class="text-center my-4">Task Details: {{ $task['gid'] }}</h2>

            <!-- Check if task exists -->
            @if($task)
                <!-- Card for displaying task details -->
                <div class="card">
                    <div class="card-body">
                        <!-- Task Details -->
                        <p class="card-text"><strong>Assignee:</strong> {{ $task['assignee']['name'] }}</p>
                        <p class="card-text"><strong>WorkSpace:</strong> {{ $task['workspace']['name'] }}</p>

                        <p class="card-text"><strong>Name:</strong> {{ $task['name'] }}</p>
                        <p class="card-text"><strong>Resource Type:</strong> {{ $task['resource_type'] }}</p>
                        <p class="card-text"><strong>Resource Sub Type:</strong> {{ $task['resource_subtype'] }}</p>
                        <p class="card-text"><strong>Created At:</strong> {{ $task['created_at'] }}</p>
                        <p class="card-text"><strong>Due On:</strong> {{ $task['due_on'] }}</p>
                        <!-- Add more details as needed -->
                    </div>
                </div>
            @else
                <!-- Displayed when task is not found -->
                <p class="text-center mt-4">Task not found or failed to retrieve task details.</p>
            @endif
        </div>
    </div>

</div>

</body>

@endsection

@section('styles')
    <!-- Reference the external CSS file -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/createTasks.css') }}">
@endsection
