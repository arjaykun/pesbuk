<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

use App\Http\Livewire\ShowPosts;
use App\Http\Livewire\ViewPost;
use App\Http\Livewire\ProfileView;
use App\Http\Livewire\ViewAbout;
use App\Http\Livewire\EditProfile;
use App\Http\Livewire\ShowFollowers;
use App\Http\Livewire\ShowFollowings;
use App\Http\Livewire\SearchPage;


Route::group(['middleware' => 'auth'], function() {

	Route::get('/', ShowPosts::class)->name('posts.index');

	Route::get('posts/{post}', ViewPost::class)->name('posts.show');

	Route::get('profile/{user}', ProfileView::class)->name('user.profile');

	Route::get('profile/{profile}/edit', EditProfile::class)->name('profiles.edit');

	Route::get('profile/{profile}/about', ViewAbout::class)->name('profiles.show');
	
	Route::get('profile/{user}/followers', ShowFollowers::class)->name('user.followers');

	Route::get('profile/{user}/followings', ShowFollowings::class)->name('user.followings');

	Route::get('search', SearchPage::class)->name('search');

});

