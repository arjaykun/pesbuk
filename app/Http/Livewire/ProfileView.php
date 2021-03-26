<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;

class ProfileView extends Component
{	
    use Commentable;
    use Repliable;
    use InfiniteScroll;
    use PostFunctions;

	public $user;

	public function mount(User $user)
	{
        $this->user = $user;
	}

    public function render()
    {	  
    	$posts = $this->user->posts()
			    ->orderBy('created_at', 'DESC')
				->with(['user','comments'])
                ->withCount('likes')
                ->get();
        
        $this->user->load([
            'profile.followers' => function($query){
                $query->limit(6);
            }, 
            'followings' => function($query) {
                $query->limit(6);
            }
        ]);
            
        $this->user->loadCount('followings');

        return view('livewire.profile-view', [
                    'user' => $this->user,
                    'posts' => $posts
                ])->layout('layouts.app');
    }
}
