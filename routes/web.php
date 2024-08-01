<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::get('books/create', [BookController::class, 'create'])->name('books.create');
Route::post('books', [BookController::class,'store'])->name('books.store');
Route::get('books/edit/{book}', [BookController::class, 'edit'])->name('books.edit');
Route::put('books/{book}', [BookController::class, 'update'])->name('books.update');
Route::delete('book/{book}', [BookController::class, 'destroy'])->name('books.destroy');



Route::get('authors', [AuthorController::class, 'index'])->name('authors.index');
Route::get('authors/create', [AuthorController::class, 'create'])->name('authors.create');
Route::post('authors', [AuthorController::class, 'store'])->name('authors.store');
Route::get('authors/{author}/edit', [AuthorController::class, 'edit'])->name('authors.edit');
Route::delete('authors/{author}', [AuthorController::class, 'destroy'])->name('authors.destroy');
Route::put('authors/{author}', [AuthorController::class, 'update'])->name('authors.update');
