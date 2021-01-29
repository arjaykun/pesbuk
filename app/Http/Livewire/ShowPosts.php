<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Post;

class ShowPosts extends Component
{		

	use Commentable;
    use Repliable;
    
	public $newPost, $editPost;

	public $deleteConfirm, $editForm = false;

	public Post $selectedPost;

    public function render()
    {		
    		$posts = Post::orderBy('created_at', 'DESC')
			    						->with(['user','comments.user', 'comments.replies.user'])
			    						->withCount('likes')
			    						->get();

        return view('livewire.show-posts', ['posts' => $posts])->layout('layouts.app');
    }

    public function createPost()
    {
    	$this->validate(['newPost' => 'required|max:3000']);

    	Post::create([
    		'user_id' => auth()->user()->id,
    		'post' => $this->newPost, 
    	]);

    	$this->newPost = null;
    }

    public function likePost(Post $post)
    {  	
    	$post->likedBy(auth()->user()->id, 'post');
    }

    public function unlikePost(Post $post)
    {
    	$post->likedBy(auth()->user()->id, 'post', false);
    }

    public function showDeleteConfirm(Post $post)
    {
    	$this->selectedPost = $post;
    	$this->deleteConfirm = true;
    }

    public function showEditForm(Post $post)
    {
    	$this->selectedPost = $post;
    	$this->editPost = $post->post;
    	$this->editForm = true;
    }

    public function deletePost()
    {
    	$post_id = $this->selectedPost->id;

    	if ($this->selectedPost->forceDelete())
    	{
				\App\Models\like::where('object_id', $post_id)->forceDelete();
    	}

    	$this->deleteConfirm = false;
    }

    public function updatePost()
    {
 		$this->validate(['editPost' => 'required|max:3000']);
    	
    	$this->selectedPost->update(['post' => $this->editPost]);

    	$this->editForm = false;
    }
}
