{{-- Main Section --}}
<div x-data class="w-full">	
	
	@error('newPost') 
		<div class="px-2 pb-1 text-red-500 text-xs">{{ $message }}</div>
	@enderror

	{{-- Create Post Form --}}
	<div class="bg-white rounded-md p-2">
		<form wire:submit.prevent="createPost" wire:ignore>
			<div class="text-gray-700 text-md pb-1">
				{{ auth()->user()->name }} 
			</div>
			<textarea 
				placeholder="What's in your mind?"
				class="w-full h-12 p-2 rounded bg-gray-200 resize-none focus:outline-none"
				wire:model.defer="newPost"
			></textarea>
			<div class="flex items-center justify-between my-2">
				<x-forms.default-button class="border-gray-200 border hover:bg-gray-200">
					Add Photo
				</x-forms.default-button>
				<x-forms.button >
					Post
				</x-forms.button>
			</div>
		</form>
	</div>
	{{-- End -> Create Post Form --}}

	{{-- Looping of Posts --}}
	@foreach ($posts as $post)
		<x-posts.post-card :post="$post" />
	@endforeach
	{{-- End -> Looping of Posts --}}

	{{-- Modals --}}
	<x-posts.delete-confirm-modal :show="$deleteConfirm" />
	<x-posts.edit-post-modal :show="$editForm" />
	<x-comments.delete-confirm-modal :show="$deleteCommentConfirm" />
	<x-comments.edit-comment-modal :show="$editCommentForm" />
	<x-replies.edit-reply-modal :show="$editReplyForm" />
	{{-- End -> Modals --}}

	{{-- loading overlay if wire:loading is true --}}
	<x-loading-overlay />

</div>
{{-- End  -> Main Section --}}
