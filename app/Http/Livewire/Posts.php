<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;

class Posts extends Component
{

		public $post;

		public $comment;

		public $commentId;

		public $reply;

		public $replyId;

		public $editCommentModal = false;

		public $editReplyModal = false;

		// show the comment edit modal
		public function showEditCommentModal ($comment_id, $comment) 
		{

			$this->commentId = $comment_id; 	
			$this->comment = $comment;
			$this->editCommentModal = true;

		}

		// show the comment edit modal
		public function showEditReplyModal ($reply_id, $reply, $comment_id) 
		{

			$this->replyId = $reply_id; 	
			$this->commentId = $comment_id; 	
			$this->reply = $reply;
			$this->editReplyModal = true;

		}


		public function createComment () 
		{	
			$this->editCommentModal = false;

			$this->validate(['comment' => 'required']);

			$newComment = $this->post->comments()->create([
				
				'user_id' => auth()->user()->id, 
				
				'comment' => $this->comment
			
			]);

			$newComment->load('replies');
			$newComment->loadCount('likes');

			$this->post->comments->push($newComment);

			$this->comment = '';

			session()->flash('success', 'You have commented on a post');
		}


		public function updateComment() 
		{				
			 $this->editCommentModal = false;

			 $this->validate(['comment' => 'required']);

			 $comment= Comment::find($this->commentId);

			 $comment->update(['comment' => $this->comment]);
			 	

			 $this->post->comments = $this->post->comments->except($this->commentId)->push($comment->fresh('user'));

			 $this->comment = '';

			 session()->flash('success', 'You have updated a comment in ' . $this->post->user->name . '\'s post.');
			
		}

		public function deleteComment($comment_id) 
		{	
				$this->editCommentModal = false;
				
				Comment::find($comment_id)->delete();

				Like::where('object_id', $comment_id)->forceDelete();

				$this->post->comments = $this->post->comments->except($comment_id);
		}


		public function createReply($comment_id) 
		{
			$this->validate(['reply' => 'required']);

			$comment = $this->post->comments->find($comment_id);

			$newReply = $comment->replies()->create([
				'user_id' => auth()->user()->id,
				'reply' => $this->reply
			]);

			$comment->replies->push($newReply);

			$this->reply = '';
		}

		public function deleteReply($reply_id, $comment_id)
		{
			$comment = $this->post->comments->find($comment_id);

			$comment->replies->find($reply_id)->delete();

			Like::where('object_id', $reply_id)->forceDelete();

			$comment->replies = $comment->replies->except($reply_id);
		}

		public function updateReply() 
		{				
			 $this->editReplyModal = false;

			 $this->validate(['reply' => 'required']);

			 $comment = $this->post->comments->find($this->commentId);

			 $reply = $comment->replies->find($this->replyId);

			 $reply->update(['reply' => $this->reply]);
			 	
			 $comment->replies =  $comment->replies
														 ->except($this->replyId)
														 ->push($reply->fresh('user'));

			 $this->reply = '';

			 session()->flash('success', 'You have updated a reply in ' . $comment->user->name . '\'s comment.');
			
		}

    public function render()
    {
        return view('livewire.posts');
    }
}
