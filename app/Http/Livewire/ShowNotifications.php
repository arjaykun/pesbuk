<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithPagination;

class ShowNotifications extends Component
{	
		use WithPagination;

    public function render()
    {		
    		auth()->user()->unreadNotifications->markAsRead();

        return view('livewire.show-notifications', [
        	'notifications' => auth()->user()->notifications()->paginate(10) 
        ]);
    }
}
