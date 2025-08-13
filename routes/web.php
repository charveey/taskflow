<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {

    // project routes
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::post('/projects/create', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{project:slug}/dashboard', [ProjectController::class, 'show'])->name('projects.show'); // this is also the dashboard
    Route::get('/projects/{project:slug}/users', [ProjectController::class, 'users'])->name('projects.users'); // users page
    // search for user
    Route::get('/users/search', [SearchController::class, 'search'])->name('search');
    // add user to project
    Route::get('/add/user', [ProjectController::class, 'addUser'])->name('projects.adduser');
    // remove user from project
    Route::delete('/remove/{project}/{user}', [ProjectController::class, 'removeUser'])->name('projects.removeuser');
    
    // chart data
    Route::get('/projects/{project}/chart-data', [ProjectController::class, 'chartData']);
    

    // tasks
    Route::get('{project:slug}/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::post('tasks/create', [TaskController::class, 'store'])->name('tasks.store');
    Route::put('tasks/{task}/edit', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('{project}/{task}/delete', [TaskController::class, 'destroy'])->name('tasks.destroy');
    
    // board
    Route::get('{project:slug}/board', [BoardController::class, 'index'])->name('board.index');
    // get all the tasks
    Route::get('/board/tasks/all', [BoardController::class, 'getTasks']);
    // update task status
    Route::post('/task/status/update', [BoardController::class, 'updateStatus'])->name('board.updateStatus');
    
    // comments
    Route::get('{project:slug}/comments', [CommentController::class, 'index'])->name('comments.index');
    Route::post('/comments/create', [CommentController::class, 'store'])->name('comments.store');


    // profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
