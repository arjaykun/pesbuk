<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;

class ShowFollowers extends Component
{		
		public User $user;

		public function mount(User $user)
		{
			$this->user = $user;
		}

    public function render()
    {
    		$this->user->profile->loadCount('followers');

    		$followers = $this->user->profile->followers()->with(['profile' => function($query) {
    			$query->select('work', 'education', 'id' ,'user_id');
    		} ])->paginate(10);


        return view('livewire.show-followers', ['user' => $this->user, 'followers' => $followers]);
    }
}
