<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// API Routes
Route::prefix('tasks')->group(function () {
    Route::get('/', [TaskController::class, 'fetchTasks']);    // Fetch all tasks
    Route::post('/', [TaskController::class, 'store']);        // Create a task
    Route::get('/{task}', [TaskController::class, 'show']);    // Show a specific task
    Route::put('/{task}', [TaskController::class, 'update']);  // Update a task
    Route::delete('/{task}', [TaskController::class, 'destroy']); // Delete a task
});
