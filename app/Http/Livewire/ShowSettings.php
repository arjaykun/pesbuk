<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowSettings extends Component
{	

		public $user;

		public $password;

		protected $validationAttributes = [
      'user.name' 	=> 'name ',
			'user.email' 	=> 'e-mail',
    ];

		public function mount()
		{
			$this->user = auth()->user()->only('name', 'email', 'password');
		}

    public function render()
    {	
        return view('livewire.show-settings', ['user' => $this->user]);
    }

    public function updateAccount()
    {
    	
    	$this->validate([
    		'user.name' 	=> 'required|min:6',
    		'user.email' 	=> 'required|email|unique:users, email',
    		'password' 		=> 'required'
    	]);

    	if(password_verify($this->password, $this->user['password'])) {

    		auth()->user()->update([
    			'name' => $this->user['name'],
    			'email' => $this->user['email'],
    		]);

            auth()->logout();

            redirect('/login');

    	} else {

    		$this->addError('password', 'Password provided does not match the record.');

    	}
    }
}
