<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ShowSettings extends Component
{	

	public $user;

	public $password;

    public $passwords;

	protected $validationAttributes = [
        'user.name' 	                     => 'name ',
		'user.email' 	                     => 'e-mail',
        'passwords.password'                 => 'new password',
        'passwords.password_confirmation'    => 'confirm password',
        'passwords.old_password'             => 'old password',
    ];

	public function mount()
	{
		$this->user = auth()->user()->only('id','name', 'email', 'password');
	}

    public function render()
    {	
        return view('livewire.show-settings', ['user' => $this->user]);
    }

    public function updateAccount()
    {
    	$this->validate([
    		'user.name' 	=> 'required|min:6',
    		'user.email' 	=> [
                'required',
                'email', 
                Rule::unique(\App\Models\User::class, 'email')->ignore($this->user['id'])
            ],
    		'password' 		=> 'required'
    	]);

    	if(password_verify($this->password, $this->user['password'])) {

    		auth()->user()->update([
    			'name' => $this->user['name'],
    			'email' => $this->user['email'],
    		]);

            // auth()->logout();

            // redirect('/login');

    	} else {

    		$this->addError('password', 'Password provided does not match the record.');

    	}
    }


    public function updatePassword()
    {
       $this->validate([
            'passwords.password'     => 'required|min:6|confirmed',
            'passwords.old_password' => 'required'
        ]);

       if(password_verify($this->passwords['old_password'], $this->user['password'])) {

            auth()->user()->update([
                'password' => Hash::make($this->passwords['password'])
            ]);

            auth()->logout();

            redirect('/login');

        } else {

            $this->addError('passwords.old_password', 'Old password does not match the record.');

        }
    }
}
