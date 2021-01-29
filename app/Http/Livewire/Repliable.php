<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Reply;

trait Repliable 
{

	public $newReply, $editReply;

	public $editReplyForm = false;

	public Reply $selectedReply;

	public function createReply(Comment $comment)
	{
		$this->validate(['newReply' => 'required|max:1000']);

		$comment->replies()->create([
			'user_id' => auth()->user()->id,
			'reply' => $this->newReply,
 		]);

 		$this->newReply = null;
	}

	public function deleteReply(Reply $reply)
	{
    $reply_id = $reply->id;

  	if ($reply->delete())
  	{
			\App\Models\like::where('object_id', $reply_id)->forceDelete();
  	}
	}

	public function updateReply()
	{
		$this->validate(['editReply' => 'required|max:1000']);
  	
  	$this->selectedReply->update(['reply' => $this->editReply]);

  	$this->editReplyForm = false;
	}

  public function showEditReplyForm(Reply $reply)
  {
  	$this->selectedReply = $reply;
  	$this->editReply = $reply->reply;
  	$this->editReplyForm = true;
  }

   public function likeReply(Reply $reply)
    {  	
    	$reply->likedBy(auth()->user()->id, 'reply');
    }

    public function unlikeReply(Reply $reply)
    {
    	$reply->likedBy(auth()->user()->id, 'reply', false);
    }

}



