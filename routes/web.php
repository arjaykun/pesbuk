<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

use App\Http\Livewire\ShowPosts;
use App\Http\Livewire\ViewPost;
use App\Http\Livewire\ProfileView;
use App\Http\Livewire\EditProfile;


Route::group(['middleware' => 'auth'], function() {

	Route::get('/', ShowPosts::class)->name('posts.index');

	Route::get('posts/{post}', ViewPost::class)->name('posts.show');

	Route::get('profile/{user}', ProfileView::class)->name('user.profile');

	Route::get('profile/{profile}/edit', EditProfile::class)->name('profiles.edit');

});

// Route::get('/', [PostController::class, 'index'])->middleware('auth')->name('posts.index');

// Route::resource('posts', PostController::class)->except('index')->middleware('auth');