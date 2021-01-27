<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Reply;

class ReplyLikes extends Component
{
		public Reply $reply;

		public $likes;

		public function mount() 
		{
			$this->likes = $this->reply->likes_count;
		}

		// like reply
		public function likeReply() 
		{

			$trashedLike = $this->reply->likes()->onlyTrashed()->firstWhere('user_id', auth()->user()->id);
			
			if( $trashedLike) {

				$trashedLike->restore();

			} else {

				$this->reply->likes()->create([

					'user_id' => auth()->user()->id, 

					'type' => 'reply'

				]);

			}

			$this->likes++;
		}

		// unlike reply
		public function unlikeReply() 
		{
			$this->reply->likes()->firstWhere('user_id', auth()->user()->id)->delete();

			$this->likes--;

		}
    public function render()
    {
        return view('livewire.reply-likes');
    }
}
