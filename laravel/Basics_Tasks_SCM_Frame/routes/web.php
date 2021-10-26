<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;
use Illuminate\Http\Request;


/**
 * Show Task Dashboard
 */

Route::get('/', 'App\Http\Controllers\Task\TaskController@showTaskList');

/**
 * Add New Task
 */

Route::post('/task', 'App\Http\Controllers\Task\TaskController@AddTask');

/**
 * Delete Task
 */

Route::delete('/task/{id}', 'App\Http\Controllers\Task\TaskController@deleteTask');
