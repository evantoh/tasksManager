<x-app-layout>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 10px;
            padding: 0;
            box-sizing: border-box;
        }

        main {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: grid;
            gap: 10px;
        }

        label {
            font-weight: bold;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        select {
            appearance: none;
            padding-right: 30px;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="12" height="6" viewBox="0 0 12 6"><path d="M6 5l6-5H0z" fill="%23007BFF" /></svg>');
            background-repeat: no-repeat;
            background-position: right 8px center;
            background-size: 8px 8px;
        }

        .btn {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            main {
                max-width: 100%;
                padding: 10px;
            }
        }
    </style>
</head>

<body>
<!-- Task creation form -->
<main>
    <form action="{{ route('tasks.store') }}" method="post">
        @csrf

        <!-- Form fields -->
        <label for="title">Title:</label>
        <input type="text" name="title" required>

        <label for="description">Description:</label>
        <textarea name="description"></textarea>

        <label for="duedate">Due Date:</label>
        <input type="date" name="duedate">

        <label for="status">Status:</label>
        <select name="status">
            <option value="to do">To Do</option>
            <option value="in progress">In Progress</option>
            <option value="done">Done</option>
        </select>

        <!-- Assignee Section (conditionally displayed) -->
        @if (isset($task) && $task->assignee)
            <label for="assignee_id">Assignee:</label>
            <span>{{ $task->assignee->name }}</span>
        @else
            <p>No assignee selected.</p>
        @endif

        <!-- Add assignee field to the create/edit form -->
        <label for="assignee_id">Assignee:</label>
        <select name="assignee_id">
            <option value="">Unassigned</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ isset($task) && $task->assignee_id == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>

        <!-- Assign Priority -->
        <select name="priority">
            <option value="high">High</option>
            <option value="medium">Medium</option>
            <option value="low">Low</option>
        </select>

        <button type="submit" class="btn">Create Task</button>
    </form>
</main>


</body>
</x-app-layout>
