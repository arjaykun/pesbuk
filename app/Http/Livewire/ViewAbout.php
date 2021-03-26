<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Profile;

class ViewAbout extends Component
{	
	public $profile;

	public function mount(Profile $profile)
	{
		$this->profile = $profile;
	}

    public function render()
    {
        return view('livewire.view-about')->layout('layouts.app');
    }
}
