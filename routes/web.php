<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

use App\Http\Livewire\ShowPosts;


Route::get('/', ShowPosts::class)->middleware('auth');

// Route::get('/', [PostController::class, 'index'])->middleware('auth')->name('posts.index');

// Route::resource('posts', PostController::class)->except('index')->middleware('auth');