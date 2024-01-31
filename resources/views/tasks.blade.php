
<x-app-layout>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            background-color: #f8f9fa;
        }

        /* Navigation Bar Styles */
        /* .navbar {
            background-color: #007bff;
        } */

        .navbar-dark .navbar-toggler-icon {
            background-color: #fff;
        }

        .navbar-brand, .navbar-nav .nav-link {
            color: #fff;
        }

        /* Container Styles */
        .container {
            margin-top: 20px;
        }

        /* Task Table Styles */
        .task-table th, .task-table td {
            text-align: center;
            vertical-align: middle;
        }

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
</head>
<body>


<!-- Main Content Container -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
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
                        <a class="nav-link btn btn-secondary" href="{{ route('tasks.listallTasks') }}">Back to Task List</a>


                    @else
                        <!-- Displayed when No Tasks are Available -->
                        <p class="text-center">No tasks available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JavaScript Dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</x-app-layout>
