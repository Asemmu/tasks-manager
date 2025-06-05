<?php

use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('tasks', [TasksController::class, 'index'])->name('tasks.index');
    Route::post('task', [TasksController::class, 'store'])->name('task.store');
    Route::get('task/{task}/edit', [TasksController::class, 'edit'])->name('task.edit');
    Route::put('task/{task}', [TasksController::class, 'update'])->name('task.update');
    Route::delete('/tasks/{task}', [TasksController::class, 'destroy'])->name('task.destroy');
});
