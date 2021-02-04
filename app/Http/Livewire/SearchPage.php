<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchPage extends Component
{	
		use Commentable;
    use Repliable;
    use PostFunctions;
    
		public $q;

		public $limit = 6;

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
												    		->limit($this->limit)
												    		->get();

				$posts = \App\Models\Post::orderBy('created_at', 'DESC')
                    ->with('user','comments')
										->withCount('likes')
										->where('post', 'like', '%'.$this->q.'%')
										->limit($this->limit)
                    ->get();							    		

        return view('livewire.search-page', compact('users', 'posts'))->layout('layouts.app');
    }
}
