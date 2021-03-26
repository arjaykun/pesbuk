<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchPage extends Component
{	
	use Commentable;
    use Repliable;
    use PostFunctions;
    
	public $q;

	public $people_limit = 4;
	public $posts_limit = 4;

	protected $queryString = [ 'q' => ['except' => '']];

	public function mount()
	{
		$this->fill(['q' => request()->get('q')]);
	}

    public function render()
    {		
		if($this->q == '')
			return view('livewire.search-page', ['users' => [], 'posts' => []])->layout('layouts.app');

		$users = \App\Models\User::select('id', 'name', 'profileImage')
					->with('profile:user_id,id,work,education')
		    		->where('name', 'like', '%'.$this->q.'%')
		    		->limit($this->people_limit)
		    		->get();

		$posts = \App\Models\Post::orderBy('created_at', 'DESC')
                    ->with('user','comments')
					->withCount('likes')
					->where('post', 'like', '%'.$this->q.'%')
					->limit($this->posts_limit)
                    ->get();							    		

        return view('livewire.search-page', compact('users', 'posts'))->layout('layouts.app');
    }

    public function seeMorePeople()
    {
    	$this->people_limit += $this->people_limit;
    }

    public function seeMorePosts()
    {
    	$this->posts_limit += $this->posts_limit;
    }
}
