<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Profile;

class EditProfile extends Component
{

		public Profile $profile;

		public function mount(Profile $profile)
		{
			$this->profile = $profile;
		}

    public function render()
    {
    		$profile = $this->profile;

        return view('livewire.edit-profile', compact('profile'));
    }
}
