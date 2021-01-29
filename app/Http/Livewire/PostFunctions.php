<?php

namespace App\Http\Livewire;

use App\Models\Post;

trait PostFunctions
{

  public $deleteConfirm, $editForm = false;

  public Post $selectedPost;

  public function likePost(Post $post)
  {  	
  	$post->likedBy(auth()->user()->id, 'post');
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
