<?php

use App\Http\Controllers\Author\AuthorController;
use App\Http\Controllers\Book\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return redirect()->route('booklist');
});
Route::get('/book/list', [BookController::class, 'showBookList'])->name('booklist');
Route::get('/author/list', [AuthorController::class, 'showAuthorList'])->name('authorlist');
Route::delete('/book/list/{id}', [BookController::class, 'deleteBookById'])->name('book.delete');
Route::get('/book/create', [BookController::class, 'showbookCreateView'])->name('create.book');
Route::post('/book/create', [BookController::class, 'submitbookCreateView'])->name('create.book');
Route::get('/book/edit/{id}', [BookController::class, 'showBookEdit'])->name('book.edit');
Route::post('/book/edit/{id}', [BookController::class, 'submitBookEditView'])->name('book.edit');
Route::get('/book/download', [BookController::class, 'downloadbookCSV'])->name('downloadbookCSV');
Route::post('/book/upload', [BookController::class, 'submitUpload'])->name('post.upload');
Route::get('/book/upload', [BookController::class, 'showUploadView'])->name('post.upload');
Route::get('/book/search', [BookController::class, 'searchBookList'])->name('searchbooklist');
Route::get('/book/searchWithDate', [BookController::class, 'searchBookListBetweenDate'])->name('searchBookListBetweenDate');

Route::get('/apiView/list-view', function () {
    return view('book.api.list');
});
Route::get('/apiView/book/edit/{id}', function () {
    return view('book.api.edit');
});
Route::get('/apiView/book/createWithAPI', function () {
    return view('book.api.create');
});
