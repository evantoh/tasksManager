
<x-app-layout>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 600px;
            margin: auto;
        }

        label {
            font-weight: bold;
        }

        textarea {
            resize: vertical;
        }

        button {
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Edit Task</h1>

        <form action="{{ route('tasks.update', $task->id) }}" method="post">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" value="{{ $task->title }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" rows="4">{{ $task->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="duedate">Due Date:</label>
                <input type="date" class="form-control" name="duedate" value="{{ $task->duedate }}">
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" name="status">
                    <option value="to do" {{ $task->status === 'to do' ? 'selected' : '' }}>To Do</option>
                    <option value="in progress" {{ $task->status === 'in progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="done" {{ $task->status === 'done' ? 'selected' : '' }}>Done</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Task</button>
        </form>
    </div>

    <!-- Include Bootstrap JS and Popper.js for Bootstrap functionality -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</x-app-layout>
