<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class ShowFollowings extends Component
{		
		use WithPagination;

    public User $user;

		public function mount(User $user)
		{
			$this->user = $user;
		}

    public function render()
    {		
    		$this->user->loadCount('followings');
    		
    		$followings = $this->user->followings()->with(['user' => function($query) {
    			$query->select('id', 'name', 'profileImage');
    		}])->paginate(10);


        return view('livewire.show-followings', ['user' => $this->user, 'followings' => $followings]);
    }
}
