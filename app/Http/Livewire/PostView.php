<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Post;

class PostView extends Component
{	

		use PostFunctions;

    public function render()
    {		
       return view('livewire.post-view');
    }
}
