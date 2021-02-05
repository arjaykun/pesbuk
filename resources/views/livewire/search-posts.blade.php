<div>
	{{-- loading overlay if wire:loading is true --}}
	<x-loading-overlay />


	<div class="bg-white rounded-md p-2">
		<div class="flex items-center border-b border-gray-400 pb-2 mb-2">
			<a href="{{ route('search', ['q' => $q]) }}" class="p-2 bg-gray-200 rounded-md text-gray-700 mr-2">All</a>
			<a href="{{ route('search.people', ['q' => $q]) }}" class="p-2 bg-gray-200 rounded-md text-gray-700 mr-2">People</a>
		<a href="{{ route('search.posts', ['q' => $q]) }}" class="p-2 bg-purple-700 rounded-md text-gray-100">Posts</a>
		</div>

	  <input type="text" wire:model.lazy="q"  placeholder="Search here..." class="w-full bg-gray-200 rounded-md py-0.5 px-2">

		@if (strlen(trim($q)) > 0)
			<p class="text-xs text-gray-500 mb-2">Search results for "{{ $q }}."</p>
		@else
			<p class="text-xs text-gray-500 mb-2">No search text found! Pleast try again.</p>
		@endif
	</div>
	{{-- show posts --}}
	<div class="mt-2">
		{{-- Looping of Posts --}}
		@foreach ($posts as $post)
			<x-posts.post-card :post="$post" :is-last="$loop->last"/>
		@endforeach
		{{-- End -> Looping of Posts --}}

		@if (count($posts) == $limit)
			<button wire:click="seeMorePosts" class="w-full block text-center text-gray-600 text-sm focus:outline-none bg-white py-1 rounded-md">See more posts...</button>
		@else 
			@if (count($posts) > 0)
				<div class="w-full block text-center text-gray-600 text-sm focus:outline-none bg-white py-1 rounded-md">No more posts ...</div>
			@endif
		@endif
	</div>
	{{-- End -> show posts --}}

	{{-- Modals --}}
	<x-posts.delete-confirm-modal :show="$deleteConfirm" />
	<x-posts.edit-post-modal :show="$editForm" />
	<x-comments.delete-confirm-modal :show="$deleteCommentConfirm" />
	<x-comments.edit-comment-modal :show="$editCommentForm" />
	<x-replies.edit-reply-modal :show="$editReplyForm" />
	{{-- End -> Modals --}}

</div>
