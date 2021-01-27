<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Replies extends Component
{
		public $comment;

		public $reply;

		public function createReply() 
		{
			$this->validate(['reply' => 'required|max:1000']);

			$newReply = $this->comment->replies()->create([
				'user_id' => auth()->user()->id,
				'reply' => $this->reply
			]);

			$this->comment->replies->push($newReply);

			$this->reply = '';
		}

    public function render()
    {	
    		return view('livewire.replies');
    }
}
