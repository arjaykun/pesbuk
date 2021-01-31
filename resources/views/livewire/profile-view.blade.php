{{-- Main Section --}}
<div x-data class="w-full">	
	
	@error('newPost') 
		<div class="px-2 pb-1 text-red-500 text-xs">{{ $message }}</div>
	@enderror

	{{-- Create Post Form --}}
	<div class="bg-white rounded-md p-2">
		<form wire:submit.prevent="createPost" wire:ignore>
			<x-user-name :user="$user" />
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

	{{-- Sidebar --}}
	<x-slot name="sidebar" >
		<div class="py-2 w-full" wire:ignore>
			<img src="{{ asset('storage/profiles/'.$user->profileImage) }}" alt="Profile Image" class="rounded-full w-40 h-40 mx-auto">
		</div>

		<h1 class="text-lg font-bold text-center text-gray-700">{{ $user->name }}</h1>
		
		@can('can-follow', $user->profile)
			<livewire:follow-user :profile="$user->profile" />
		@else
			<x-icon-link text="Edit Profile" class="py-1 px-2 mx-auto w-32" href="{{ route('profiles.edit', ['profile' => $user->profile]) }}">
				<svg class="w-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
				</svg>
			</x-icon-link>
		@endcan

		{{-- other profile info --}}
		<div class="p-2 my-2">

		</div>
		{{-- End -> other profile info--}}

		<hr class="my-2" />
		<x-menu />
		
	</x-slot>
	{{-- End -> Sidebar --}}


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

</div>
{{-- End  -> Main Section --}}
