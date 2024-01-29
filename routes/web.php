<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AsanaController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('tasks.listAllTasks');
// })->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

Route::group(['middleware' => 'checkLoggedIn'], function () {

    Route::get('/dashboard', [TaskController::class, 'listallTasks'])->name('tasks.listallTasks');

    // Fetch all Tasks from Asana
   Route::get('/fetch-asana-tasks', [AsanaController::class, 'fetchAsanaTasks'])->name('tasks.fetchAsanaTasks');


        // Route to create tasks
        Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');

        // Store/save tasks created using Post method
        Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

        // Get each task's details by passing taskID
        Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');

        // Edit tasks
        Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');

        // Update tasks
        Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');

        // Delete tasks
        Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

        // Display tasks that are overdue
        Route::get('/tasks/overdue', [TaskController::class, 'overdue'])->name('tasks.overdue');



        // Get details of a task from Asana
        Route::get('/tasks/{id}/details', [AsanaController::class, 'detailsFromAsana'])->name('tasks.detailsFromAsana');

            // Your protected routes go here
        Route::get('/', function () {
                return view('welcome');
            });            // Add more routes as needed
        });



require __DIR__.'/auth.php';
