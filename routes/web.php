<?php

use Illuminate\Support\Facades\Route;

Route::get('posts', [\App\Http\Controllers\PostController::class, 'index'])->name('posts.show');
Route::get('posts/{slug}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.show');
Route::get('{slug}', [\App\Http\Controllers\PageController::class, 'show'])->name('pages.show');
Route::get('/', [\App\Http\Controllers\PageController::class, 'index'])->name('pages.index');
