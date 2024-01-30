<x-app-layout>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task Details</title>

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
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .task-details p {
            margin-bottom: 10px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }

        .btn-warning {
            background-color: #ffc107;
            color: #212529;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: #fff;
        }
    </style>
</head>

<body>
    <header>
        <h1>Task Details</h1>
    </header>

    <!-- Main content section -->
    <main>
        <div class="task-details">
            <!-- Display task details -->
            <p><strong>Title:</strong> <?= htmlspecialchars($task->title) ?></p>
            <p><strong>Description:</strong> <?= htmlspecialchars($task->description) ?></p>
            <p><strong>Due Date:</strong> <?= htmlspecialchars($task->duedate) ?></p>
            <p><strong>Status:</strong> <?= htmlspecialchars($task->status) ?></p>
            <p><strong>Assignee:</strong> {{ $task->assignee ? $task->assignee->name : 'Unassigned' }}</p>

        </div>

        <!-- Button to edit the task -->
        <a href="<?= route('tasks.edit', $task->id) ?>" class="btn btn-warning">Edit Task</a>

        <!-- Form for deleting the task -->
        <form action="<?= route('tasks.destroy', $task->id) ?>" method="post" style="display:inline;">
            <?php echo csrf_field(); ?>
            <?php echo method_field('delete'); ?>
            <button type="submit" class="btn btn-danger">Delete Task</button>
        </form>

        <!-- Link to go back to Task List -->
        <a href="<?= route('tasks.listallTasks') ?>" class="btn btn-secondary">Back to Task List</a>
    </main>
</body>
</x-app-layout>
