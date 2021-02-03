<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class ShowPosts extends Component
{		

	use Commentable;
    use Repliable;
    use InfiniteScroll;
    use PostFunctions;

    public function render()
    {		
        $followings = auth()->user()->followings->pluck('user_id')->toArray();
        
        array_push($followings, auth()->user()->id);

    	$posts = Post::whereIn('user_id', $followings)
                    ->orderBy('created_at', 'DESC')
                    ->limit($this->count)
					->with('user','comments')
					->withCount('likes')
                    ->get();

        return view('livewire.show-posts', ['posts' => $posts])->layout('layouts.app');
    }

}
