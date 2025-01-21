<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Web Routes
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

