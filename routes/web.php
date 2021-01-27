<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->middleware('auth')->name('posts.index');

Route::resource('posts', PostController::class)->only('store', 'show', 'update')->middleware('auth');