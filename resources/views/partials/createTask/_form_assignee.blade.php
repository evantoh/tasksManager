
<!-- Assignee Section -->
@if (isset($task) && $task->assignee)
    <!-- If assignee is set, display their name -->
    <div class="form-group">
        <label for="assignee_id">Assignee:</label>
        <span>{{ $task->assignee->name }}</span>
    </div>
@else
    <!-- If no assignee selected, display message -->
    <p>No assignee selected.</p>
@endif