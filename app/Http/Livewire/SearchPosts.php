<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchPosts extends Component
{   
    use Commentable;
    use Repliable;
    use PostFunctions;
    
	public $q;

	public $limit = 10;

	protected $queryString = [ 'q' => ['except' => '']];

	public function mount()
	{
		$this->fill(['q' => request()->get('q')]);
	}

    public function render()
    {
		if($this->q == '')
				return view('livewire.search-posts', ['posts' => []])->layout('layouts.app');

		$posts = \App\Models\Post::orderBy('created_at', 'DESC')
	                ->with('user','comments')
					->withCount('likes')
					->where('post', 'like', '%'.$this->q.'%')
					->limit($this->limit)
                    ->get();		

        return view('livewire.search-posts', compact('posts'))->layout('layouts.app');
    }

    public function updatedQ()
    {
    	$this->reset('limit');
    }

    public function seeMorePosts()
    {
    	$this->limit += $this->limit;
    }
}
