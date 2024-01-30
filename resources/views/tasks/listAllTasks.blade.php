<x-app-layout>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task List</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            background-color: #007BFF;
            color: #fff;
            text-align: center;
            padding: 20px;
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

        .btn {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            background-color: #007BFF;
            color: #fff;
            transition: background-color 0.3s ease-in-out;
        }

        .btn:hover {
            background-color: #0056b3;
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

                        </div>
                        <a href="<?= route('tasks.show', $task->id) ?>" class="btn">Details</a>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>No tasks found.</li>
            <?php endif; ?>
        </ul>

        <a href="<?= route('tasks.create') ?>" class="btn">Create Task</a>
        <a href="<?= route('tasks.fetchAsanaTasks') ?>" class="btn">View Tasks Asana</a>
    </main>
</body>
</x-app-layout>
