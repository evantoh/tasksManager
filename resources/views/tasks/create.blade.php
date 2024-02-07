<x-app-layout>
    <main>
        <!-- Task creation form -->
        <form id="task-form" action="{{ route('tasks.store') }}" method="post">
            @csrf <!-- CSRF protection -->

            <!-- Title input -->
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>

            <!-- Description textarea -->
            <label for="description">Description:</label>
            <textarea id="description" name="description"></textarea>

            <!-- Due Date input -->
            <label for="duedate">Due Date:</label>
            <input type="date" id="duedate" name="duedate">

            <!-- Status select dropdown -->
            <label for="status">Status:</label>
            <select id="status" name="status">
                <option value="to do">To Do</option>
                <option value="in progress">In Progress</option>
                <option value="done">Done</option>
            </select>

            <!-- Assignee Section -->
            @if (isset($task) && $task->assignee)
                <!-- If assignee is set, display their name -->
                <label for="assignee_id">Assignee:</label>
                <span>{{ $task->assignee->name }}</span>
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

            <!-- Priority select dropdown -->
            <label for="priority">Priority:</label>
            <select id="priority" name="priority">
                <option value="high">High</option>
                <option value="medium">Medium</option>
                <option value="low">Low</option>
            </select>

            <!-- Submit button -->
            <button type="submit" class="btn-success" style="background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;">Create Task</button>
        </form>
    </main>
</x-app-layout>
<!-- Reference the external CSS file -->
<link rel="stylesheet" type="text/css" href="{{ ('css/createTasks.css') }}">
