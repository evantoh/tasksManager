<!-- Updated search form with new styles -->
<form action="{{ route('tasks.search') }}" method="GET" class="search-form">
    <input type="text" name="query" placeholder="Search tasks by title,description,due date and status..." class="search-input">
    <button type="submit" class="search-button">Search</button>
</form>