<?php

use App\Http\Controllers\API\Book\BookAPIController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/book/list', [BookAPIController::class, 'showBookList']);

Route::get('/book/{id}', [BookAPIController::class, 'getBookById']);
Route::post('/book/create', [BookAPIController::class, 'createBook']);
Route::post('/book/upload', [BookAPIController::class, 'uploadBookCSVFile']);
Route::post('/book/edit/{id}', [BookAPIController::class, 'updateBook']);
Route::delete('/book/delete/{id}', [BookAPIController::class, 'deleteBookById']);
