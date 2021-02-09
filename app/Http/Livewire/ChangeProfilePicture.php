<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ChangeProfilePicture extends Component
{	
	use WithFileUploads;

	public User $user;

	public $image;	

	public function mount(User $user)
	{
		$this->user = $user;
	}

    public function render()
    {
        return view('livewire.change-profile-picture', ['user' => $this->user]);
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'required|image|max:2500',
        ]); 
    }

    public function save()
    {
        $this->validate([
            'image' => 'required|image|max:2500',
        ]);
        
        $tokens = explode('.', $this->image->getFileName());
        $ext = $tokens[count($tokens) - 1];

        $fileName = Str::kebab($this->user->name).'-'.now()->format('m-d-Y-h-i-s') . '.' . $ext;

        $old_filename = $this->user->profileImage;
       
        if ($this->user->update(['profileImage' => $fileName ])) {
           
            if($this->image->storeAs('public/profiles', $fileName)) {

                if($old_filename !== 'default.png') {

                    Storage::delete('public/profiles/'.$old_filename);
                    
                }

            }

            session()->flash('success', 'Image is uploaded successfully.');
        }
        
    }
}
