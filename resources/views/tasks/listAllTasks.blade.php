@extends('layouts.app')

@section('content')

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task List</title>

    <style>


        /* Add new styles for the search form */
        form.search-form {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        input.search-input {
            flex-grow: 1;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            margin-right: 10px;
            box-sizing: border-box;
        }

        button.search-button {
            padding: 10px 20px;
            border: none;
            border-radius: 15px;
            background-color: #007BFF;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
                margin-top: -20px;
        }

        button.search-button:hover {
            background-color: #0056b3;
        }



        main {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .task-list {
            list-style: none;
            padding: 0;
        }

        .task-list li {
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            transition: transform 0.3s ease-in-out;
        }

        .task-list li:hover {
            transform: scale(1.05);
        }

        .task-details {
            margin-bottom: 20px;
        }

  
        .createtasks{
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 15px;
            background-color: #007BFF;
            color: #fff;
            transition: background-color 0.3s ease-in-out;
        }


        @media only screen and (max-width: 768px) {
            main {
                max-width: 100%;
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <header>
</header>


    <!-- Main content section -->
    <main>
    <div>
            <!-- Updated search form with new styles -->
            <form action="{{ route('tasks.search') }}" method="GET" class="search-form">
                <input type="text" name="query" placeholder="Search tasks by title,description,due date and status..." class="search-input">
                <button type="submit" class="search-button">Search</button>
            </form>
        </div>    
        <ul class="task-list">
            <?php if (!empty($tasks)): ?>
                <?php foreach ($tasks as $task): ?>
                    <li>
                        <div class="task-details">
                            <p><strong>Title:</strong> <?= htmlspecialchars($task->title) ?></p>
                            <p><strong>Description:</strong> <?= htmlspecialchars($task->description) ?></p>
                            <p><strong>Due Date:</strong> <?= htmlspecialchars($task->duedate) ?></p>
                            <p><strong>Status:</strong> <?= htmlspecialchars($task->status) ?></p>
                            <p><strong>Assignee:</strong> {{ $task->assignee ? $task->assignee->name : 'Unassigned' }}</p>
                            <p><strong>Priority:</strong> <?= htmlspecialchars($task->priority) ?></p>


                        </div>
                        <a href="<?= route('tasks.show', $task->id) ?>" class="createtasks">Details</a>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>No tasks found.</li>
            <?php endif; ?>
        </ul>

        <a href="<?= route('tasks.create') ?>" class="createtasks">Create Task</a>
        <a href="<?= route('tasks.fetchAsanaTasks') ?>" class="createtasks">View Tasks Asana</a>
    </main>
</body>
@endsection