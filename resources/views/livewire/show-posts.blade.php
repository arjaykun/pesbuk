{{-- Main Section --}}
<div x-data class="w-full">	
	
	@error('newPost') 
		<div class="px-2 pb-1 text-red-500 text-xs">{{ $message }}</div>
	@enderror

	{{-- Create Post Form --}}
	<div class="bg-white rounded-md p-2 mb-2">
		<form wire:submit.prevent="createPost" wire:ignore>
			<x-user-name />
			<textarea 
				placeholder="What's in your mind?"
				class="w-full h-12 p-2 rounded bg-gray-200 focus:outline-none"
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
	<div>
		{{-- Looping of Posts --}}
		@foreach ($posts as $post)
			<x-posts.post-card :post="$post" :is-last="$loop->last"/>
		@endforeach
		{{-- End -> Looping of Posts --}}

		@if ($posts->count() !== $count)
			<h3 class="text-center block text-sm text-gray-700 bg-gray-200 rounded-md my-2 p-2">There are no more post to load.</h3>
		@endif
	</div>

	{{-- Modals --}}
	<x-posts.delete-confirm-modal :show="$deleteConfirm" />
	<x-posts.edit-post-modal :show="$editForm" />
	<x-comments.delete-confirm-modal :show="$deleteCommentConfirm" />
	<x-comments.edit-comment-modal :show="$editCommentForm" />
	<x-replies.edit-reply-modal :show="$editReplyForm" />
	{{-- End -> Modals --}}

	{{-- loading overlay if wire:loading is true --}}
	<x-loading-overlay />

	@if ($posts->count())
		@push('scripts')
			<script>
				const lastPost = document.querySelector('#lastPost');
				const options = {
					root: null,
					threshold: 1,
					rootMargin: '0px'
				}

				const observer =  new IntersectionObserver( entries => {
					entries.forEach(entry => {
						if(entry.isIntersecting) {
							@this.scroll()
						}
					})
				}, options)

				observer.observe(lastPost);
			</script>
		@endpush
	@endif

</div>
{{-- End  -> Main Section --}}
