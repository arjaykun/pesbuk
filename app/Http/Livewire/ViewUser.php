<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ViewUser extends Component
{		
	public \App\Models\User $user; 

	public $follow;

	public function mount()
	{  
		$this->follow = $this->user->profile->hasFollowed();
	}

    public function follow()
    {
    	$this->user->profile->follow();

    	$this->follow = true;
    }

    public function unfollow()
    {
    	$this->user->profile->unfollow();

    	$this->follow = false;
    }

    public function render()
    {
        return view('livewire.view-user');
    }
}
