<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class ShowFollowings extends Component
{		
	use WithPagination;

  public User $user;

  public $search;

  protected $queryString = [ 'search' => ['except' => '']];

	public function mount(User $user)
	{
		$this->user = $user;

    $this->fill(request()->only('search'));
	}

	public function updatingSearch()
  {
     $this->resetPage();
  }

  public function render()
  {		
		$this->user->loadCount('followings');
		
		$followings = $this->user->followings()
			->whereHas('user', function(Builder $query) {
				$query->where('name', 'LIKE', '%'.$this->search.'%');
			})
			->with(['user' => function($query) {
				$query->select('name', 'id', 'profileImage');
			}])
			->paginate(10);


		return view('livewire.show-followings', ['user' => $this->user, 'followings' => $followings]);
  }
}
