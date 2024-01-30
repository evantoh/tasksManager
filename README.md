<p# Task Management System

## Introduction

This document provides an overview of the Task Management System implemented in the `TaskController` of a Laravel application. The system allows users to perform various operations such as creating,reading, editing and deleting tasks, as well as viewing tasks by use of thrid Party task mangaement api (ASANA).

## Task Controller

The `TaskController` is responsible for handling requests related to task management. It includes the following key functionalities:

### 1. List All Tasks

- **Method:** `listAllTasks`
- **Description:** Retrieves all tasks from the `Task` model and displays them in a view.
- **View:** `tasks.listAllTasks`

### 2. Create Task

- **Method:** `create`
- **Description:** Displays the view for creating a new task.
- **View:** `tasks.create`

### 3. Store Task

- **Method:** `store`
- **Description:** Stores a new task in the database with validation for required fields. Associates the task with the authenticated user.
- **Validation Rules:**
  - `title`: Required
  - `description`: Optional, string
  - `duedate`: Optional, date
  - `status`: Optional, must be one of 'to do', 'in progress', 'done'
- **Redirects:**
  - On success: Redirects to `/tasks` with a success message.
  - On failure: Redirects to `/login` with an error message if the user is not authenticated.

### 4. Show Task

- **Method:** `show`
- **Description:** Displays details of a specific task.
- **View:** `tasks.show`

### 5. Edit Task

- **Method:** `edit`
- **Description:** Displays the view for editing a specific task.
- **View:** `tasks.edit`

### 6. Update Task

- **Method:** `update`
- **Description:** Updates the details of a task with validation for required fields. Converts date strings to Carbon objects.
- **Validation Rules:**
  - `title`: Required
  - `description`: Optional, string
  - `duedate`: Optional, date
  - `status`: Optional, must be one of 'to do', 'in progress', 'done'
- **Redirects:**
  - On success: Redirects to `/tasks` with a success message.

### 7. Delete Task

- **Method:** `destroy`
- **Description:** Deletes a specific task.
- **Redirects:** Redirects to `/tasks` with a success message.

### 8. Overdue Tasks

- **Method:** `overdue`
- **Description:** Retrieves tasks with overdue due dates and displays them in a view.
- **View:** `tasks.overdue`


## 9.Search for Tasks

### Method: `search`
- **Description:** Searches for tasks based on title, description, due date, or status and displays the results in a view.
- **Input:** Query parameter `query`

---

## Conclusion

The Task Management System provides a comprehensive set of functionalities for managing tasks, allowing users to interact with their tasks efficiently.


## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
