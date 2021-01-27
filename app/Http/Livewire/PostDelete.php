<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Post;

class PostDelete extends Component
{	

		protected $listeners = ['deletePost' => 'deletePost'];
		
		public function deletePost($id) 
		{
			$post = Post::find($id);

			$post->forceDelete();
		
		 	session()->flash('success', 'Post has been deleted successfully');

			redirect('/');

		}


    public function render()
    {		
       return view('livewire.post-delete');
    }
}
