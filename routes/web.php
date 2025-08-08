<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SearchController;
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


    // profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
