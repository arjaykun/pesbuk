<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;

use Livewire\WithPagination;


class ShowFollowers extends Component
{		

    use WithPagination;

	public User $user;

    public $search = '';

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
		$this->user->profile->loadCount('followers');

		$followers = $this->user->profile->followers()
            ->where('name', 'LIKE', '%'.$this->search.'%')
            ->with(['profile' => fn ($query) => $query->select('work', 'education', 'id', 'user_id') ])
            ->paginate(10);

        return view('livewire.show-followers', ['user' => $this->user, 'followers' => $followers]);
    }
}
