<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

Route::get('/', fn() => redirect()->route('books.index'));

Route::resource('authors', AuthorController::class);
Route::resource('books', BookController::class);