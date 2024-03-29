<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use App\Notifications\CommentNotification;
use App\Notifications\LikeNotification;

trait Commentable 
{

	public $newComment, $editComment;

	public $deleteCommentConfirm = false;
	public $editCommentForm = false;

	public $selectedComment;

	public function createComment(Post $post)
	{
		$this->validate(['newComment' => 'required|max:1000']);

		$post->comments()->create([
			'user_id' => auth()->user()->id,
			'comment' => $this->newComment,
 		]);

    if(auth()->user()->id !== $post->user->id)
      $post->user->notify(new CommentNotification(auth()->user(), $post->id));

 		$this->newComment = null;
	}

	public function deleteComment()
	{
		$comment_id = $this->selectedComment->id;

  	if ($this->selectedComment->delete())
  	{
			\App\Models\like::where('object_id', $comment_id)->forceDelete();
  	}

  	$this->deleteCommentConfirm = false;
	}

	public function updateComment()
	{
		$this->validate(['editComment' => 'required|max:1000']);
  	
  	$this->selectedComment->update(['comment' => $this->editComment]);

  	$this->editCommentForm = false;
	}

	public function showDeleteCommentConfirm(Comment $comment)
  {
  	$this->selectedComment = $comment;
  	$this->deleteCommentConfirm = true;
  }

  public function showEditCommentForm(Comment $comment)
  {
  	$this->selectedComment = $comment;
  	$this->editComment = $comment->comment;
  	$this->editCommentForm = true;
  }

  public function likeComment(Comment $comment)
  {  	
  	$comment->likedBy(auth()->user()->id, 'comment');

    if(auth()->user()->id !== $comment->user->id)
      $comment->user->notify(new LikeNotification(auth()->user(), $comment->post->id, 'comment'));
  }

  public function unlikeComment(Comment $comment)
  {
  	$comment->likedBy(auth()->user()->id, 'comment', false);
  }



}
