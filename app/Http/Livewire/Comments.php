<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class Comments extends Component
{		
		public Post $post; 
		
		public $newComment = '' ;

		public function rules() 
		{
			return ['newComment' => 'required|max:1000'];
		}

		// create comment function
		public function createComment() 
		{

			$this->validate();

			$this->post->comments()->create( [

				'user_id' => auth()->user()->id, 

				'comment' => $this->newComment

			]);

			$this->reset('newComment');

			session()->flash('success', 'Comment created successfully.');

		}

    public function render()
    {	
    		$comments = $this->post->comments;

        return view('livewire.comments', compact('comments'));
    }
}
