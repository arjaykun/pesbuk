<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Comment;

class CommentLikes extends Component
{
		public Comment $comment;

		public $likes;

		public function mount() 
		{
			$this->likes = $this->comment->likes_count;
		}

		// like post
		public function likePost() 
		{

			$trashedLike = $this->comment->likes()->onlyTrashed()->firstWhere('user_id', auth()->user()->id);
			
			if( $trashedLike) {

				$trashedLike->restore();

			} else {

				$this->comment->likes()->create([

					'user_id' => auth()->user()->id, 

					'type' => 'comment'

				]);

			}

			$this->likes++;
		}

		// unlike post
		public function unlikePost() 
		{
			$this->comment->likes()->firstWhere('user_id', auth()->user()->id)->delete();

			$this->likes--;

		}

    public function render()
    {
        return view('livewire.comment-likes');
    }
}
