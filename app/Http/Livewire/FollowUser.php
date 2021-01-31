<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FollowUser extends Component
{	
	public \App\Models\Profile $profile; 

	public $follow;

	public function mount()
	{
		$this->follow = $this->profile->hasFollowed();
	}

    public function render()
    {
        return view('livewire.follow-user');
    }

    public function follow()
    {
    	$this->profile->follow();

    	$this->follow = true;
    }

    public function unfollow()
    {
    	$this->profile->unfollow();

    	$this->follow = false;
    }


}
