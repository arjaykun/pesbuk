<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Post;

class PostLikes extends Component
{	

		public Post $post;

		public $likes;

		public function mount() 
		{
			$this->likes = $this->post->likes_count;
		}

		// like post
		public function likePost() 
		{


			$trashedLike = $this->post->likes()->onlyTrashed()->firstWhere('user_id', auth()->user()->id);
			
			if( $trashedLike) {

				$trashedLike->restore();

			} else {

				$this->post->likes()->create([

					'user_id' => auth()->user()->id, 

					'type' => 'post'

				]);

			}

			$this->likes++;
		}

		// unlike post
		public function unlikePost() 
		{
			$this->post->likes()->firstWhere('user_id', auth()->user()->id)->delete();

			$this->likes--;

		}

		// render function
    public function render()
    {
        return view('livewire.post-likes');
    }
}
