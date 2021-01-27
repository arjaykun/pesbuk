<?php

namespace App\Http\Livewire;

use App\Models\Post;

trait PostFunctions
{	

		public Post $post;

		public $newPost = '';

   	public $confirmModal = false;
		public $editModal = false;

		public $selected_id;

		// remove post
		public function removePost()
		{
			
			Post::find($this->selected_id)->forceDelete();

			session()->flash('success', 'Post deleted successfully');

			if(request()->segment(3) == 'post-view'){
				$this->confirmModal = false;
				return redirect()->route('home');
			}
			else
				$this->confirmModal = false;
		
		}

		// update post
		public function updatePost()
		{
			$this->validate([
				'newPost' => 'required|max:1000'
			]);

			Post::find($this->selected_id)->update(['post' => $this->newPost]);

			$this->post->post = $this->newPost;

			$this->editModal = false;
				
			$this->reset('newPost');

			session()->flash('success', 'Post updated successfully');
		}


		// toggle confirm modal
		public function toggleConfirmModal($id = 0) 
		{

			$this->confirmModal = !$this->confirmModal;

			$this->selected_id = $id;

		}

		// toggle edit modal
		public function toggleEditModal($id = 0) 
		{
			
			$this->editModal = !$this->editModal;

			$this->selected_id = $id;
			
			if($id !== 0){
				$_post = Post::find($id);
				$this->newPost = $_post->post;
				$this->post = $_post;
			}

		}
}
