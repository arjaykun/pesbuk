<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class ShowPosts extends Component
{		

	use Commentable;
    use Repliable;
    use InfiniteScroll;
    use PostFunctions;

    public $newPost, $editPost;

    public function render()
    {		
    	$posts = Post::orderBy('created_at', 'DESC')
                    ->limit($this->count)
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
