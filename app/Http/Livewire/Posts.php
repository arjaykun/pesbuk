<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Comment;

class Posts extends Component
{

		public $post;

		public $comment;

		public $commentId;

		// public $status;

		public $editCommentModal = false;

		// show the comment edit modal
		public function showEditCommentModal ($comment_id, $comment) 
		{

			$this->commentId = $comment_id; 	
			$this->comment = $comment;
			$this->editCommentModal = true;

		}


		public function createComment () 
		{	
			$this->editCommentModal = false;

			$this->validate(['comment' => 'required|max:1000']);

			$newComment = $this->post->comments()->create([
				
				'user_id' => auth()->user()->id, 
				
				'comment' => $this->comment
			
			]);

			$this->post->comments->push($newComment);

			$this->comment = '';

			session()->flash('success', 'You have commented on a post');
		}


		public function updateComment() 
		{				
			 $this->editCommentModal = false;

			 $this->validate(['comment' => 'required|max:1000']);

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

				$this->post->comments = $this->post->comments->except($comment_id);
		}

    public function render()
    {
        return view('livewire.posts');
    }
}
