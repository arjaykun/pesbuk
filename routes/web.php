<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

use App\Http\Livewire\ShowPosts;
use App\Http\Livewire\ViewPost;


Route::group(['middleware' => 'auth'], function() {

	Route::get('/', ShowPosts::class)->name('posts.index');

	Route::get('posts/{post}', ViewPost::class)->name('posts.show');

});

// Route::get('/', [PostController::class, 'index'])->middleware('auth')->name('posts.index');

// Route::resource('posts', PostController::class)->except('index')->middleware('auth');