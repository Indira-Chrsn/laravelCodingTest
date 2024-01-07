<?php

use Illuminate\Support\Facades\Route;

// route resource
Route::resource('/books', \App\Http\Controllers\BookController::class); // this route's default name is 'books.index'

// GET
Route::get('/search', [\App\Http\Controllers\BookController::class, 'search'])->name('books.search');
Route::get('/author', [\App\Http\Controllers\BookController::class, 'showTopAuthor'])->name('author.show');
Route::get('/vote', [\App\Http\Controllers\BookController::class, 'showVoteData'])->name('vote.options');

// POST
Route::post('/vote', [\App\Http\Controllers\BookController::class, 'insertVote'])->name('vote.insert');

