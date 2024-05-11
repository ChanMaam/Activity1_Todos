<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Define routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks/store', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/show/{id}', [TaskController::class, 'show'])->name('tasks.show');
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/update', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/update', [TaskController::class, 'destroy'])->name('tasks.destroy');