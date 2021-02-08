<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchPeople extends Component
{
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
			return view('livewire.search-people', ['users' => [] ])->layout('layouts.app');

		$users = \App\Models\User::select('id', 'name', 'profileImage')
							->with('profile:user_id,id,work,education')
							->where('name', 'like', '%'.$this->q.'%')
							->limit($this->limit)
							->get();

        return view('livewire.search-people', compact('users'))->layout('layouts.app');
    }

    public function updatedQ()
    {
    	$this->reset('limit');
    }

    public function seeMorePeople()
    {
    	$this->limit += $this->limit;
    }
}
