<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{	

		public function index() 
		{
			// $posts = Post::orderBy('updated_at', 'DESC')
	  // 		->with('user', 'comments.user', 'comments.replies.user')
	  // 		->withCount(['likes'])
	  // 		->get();
			$posts = Post::all();
	  	return view('dashboard', compact('posts'));
		}

    public function store() 
    {
			request()->validate([

				'post' => 'required'

			]);

			Post::create([

				'post' => request()->post,

				'user_id' => auth()->user()->id

			]);

			return back()->with('success', 'New post is successfully created.');
    }


    public function show(Post $post) 
    {
			$post->loadCount(['likes', 'comments'])->load(['user', 'comments.user']);

			return view('posts.show', compact('post'));
    }

    public function update(Post $post) 
    {
    	$this->authorize('modify-post', $post);

    	request()->validate([

				'post' => 'required|max:1000'

			]);

			$post->update(request()->only('post'));

			return back()->with('success', 'Post has been successfully updated.');
    }

    public function destroy(Post $post)
    {
    	$this->authorize('modify-post', $post);

    	$post->delete();

    	return back()->with('success', 'Post has been successfully deleted.');
    }
}
