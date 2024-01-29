<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadata -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task Management System</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/landingPage.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Header Section -->
    <header>
        <h1>Welcome to the Task Management System</h1>
    </header>

    <!-- Responsive Image Section -->
    <div class="container">
        <!-- Task Management Image -->
        <img src="{{ asset('images/tasks.png') }}" class="img-fluid" alt="Task Management Image">
    </div>

    <!-- Main Section -->
    <main>
        <!-- User Action Prompt -->
        <p>Please register or log in if already registered!</p>

        <!-- Login and Register Buttons -->
        <a href="{{ route('login') }}" class="btn btn-primary btn-custom">Login</a>
        <a href="{{ route('register') }}" class="btn btn-secondary btn-custom">Register</a>
    </main>

    <!-- Footer Section -->
    <footer>
        <!-- Copyright Information -->
        <p>&copy; 2024 schoolTry</p>
    </footer>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
