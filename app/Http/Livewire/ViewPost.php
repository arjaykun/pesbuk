<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Post;

class ViewPost extends Component
{
	use Commentable;
    use Repliable;
    use PostFunctions;

	public Post $post;

	public function mount(Post $post)
	{
		$this->post = $post;
	}

    public function render()
    {	
			$post = $this->post;
			$post->load(['user','comments.user', 'comments.replies.user']);
			$post->loadCount('likes');

      return view('livewire.view-post', ['post' => $post])
        					->layout('layouts.app');
    }

    public function deletePost()
    {
        $post_id = $this->selectedPost->id;

        if ($this->selectedPost->forceDelete())
        {
                \App\Models\like::where('object_id', $post_id)->forceDelete();
        }

        redirect('/');
    }

    public function updatePost()
    {
        $this->validate(['editPost' => 'required|max:3000']);

        $this->selectedPost->update(['post' => $this->editPost]);

        $this->editForm = false;

      	$this->post->post = $this->editPost;
    }
}
