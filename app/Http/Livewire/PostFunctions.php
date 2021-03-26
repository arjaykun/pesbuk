<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Notifications\LikeNotification;

trait PostFunctions
{

  public $newPost, $editPost;

  public $deleteConfirm, $editForm = false;

  public $selectedPost;

  public function createPost()
  {
      $this->validate(['newPost' => 'required|max:3000']);

      Post::create([
          'user_id' => auth()->user()->id,
          'post' => $this->newPost, 
      ]);

      $this->newPost = null;
  }


  public function deletePost()
  {
      $post_id = $this->selectedPost->id;

      if ($this->selectedPost->forceDelete())
      {
              \App\Models\like::where('object_id', $post_id)->forceDelete();
      }

      $this->deleteConfirm = false;
  }

  public function updatePost()
  {
      $this->validate(['editPost' => 'required|max:3000']);

      $this->selectedPost->update(['post' => $this->editPost]);

      $this->editForm = false;
  }

  public function likePost(Post $post)
  {  	
  	$post->likedBy(auth()->user()->id, 'post');

    if(auth()->user()->id !== $post->user->id)
      $post->user->notify(new LikeNotification(auth()->user(), $post->id, 'post'));
  }

  public function unlikePost(Post $post)
  {
  	$post->likedBy(auth()->user()->id, 'post', false);
  }

  public function showDeleteConfirm(Post $post)
  {
  	$this->selectedPost = $post;
  	$this->deleteConfirm = true;
  }

  public function showEditForm(Post $post)
  {
  	$this->selectedPost = $post;
  	$this->editPost = $post->post;
  	$this->editForm = true;
  }

}
