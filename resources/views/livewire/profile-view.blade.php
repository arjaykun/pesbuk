{{-- Main Section --}}
<div x-data class="w-full">	
	
	<div class="lg:hidden block mb-2 mt-20">
		<div class="bg-white w-full">

			<div class="w-full flex justify-center relative">
				<img src="{{ asset('storage/profiles/'.$user->profileImage) }}" alt="Profile Image" class="w-36 h-36 rounded-full absolute" style="margin-top: -80px" />
			</div>

			<div class="text-center pt-16">
				<h1 class="text-gray-600 text-lg  font-bold">
					{{$user->name}} 
					@if($user->profile->nickname)<span class="font-normal text-sm">({{$user->profile->nickname}})</span>@endif
				</h1> 
				<div class="flex items-center justify-center">
					<div>
						@can('can-follow', $user->profile)
							<livewire:follow-user :profile="$user->profile" />
						@else
							<x-icon-link text="Edit Profile" class="p-2 mx-auto" href="{{ route('profiles.edit', ['profile' => $user->profile]) }}">
								<svg class="w-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
								</svg>
							</x-icon-link>
						@endcan
					</div>
					<div>
					<x-icon-link text="Message" class="p-2 ml-2" href="#">
						<svg class="w-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
						</svg>
					</x-icon-link>
					</div>
				</div>
			</div>


			<div class="py-2 text-sm rounded-md text-gray-600 text-center">
				{{ $user->profile->bio }}
						
				@if ($user->profile->education)
					<div class="my-1 text-center">
						<svg class="w-4 inline-block mr-2 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						  <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
						  <path fill="#fff" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
						</svg>
						@php
							$education = head($user->profile->education);
						@endphp
						<div class="text-sm text-gray-700 inline-block">Studied <span class="font-semibold">{{ $education['program'] ?? '' }}</span> at <span class="font-semibold">{{ $education ['school']}}</span></div>
					</div>
				@endif
				
				@if ($user->profile->location)
					<div class="my-1 text-center">
						<svg class="w-4 inline-block mr-2 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
						  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
						</svg>
						<div class="text-sm text-gray-700">Lives in <span class="font-semibold">{{ $user->profile->location }}</span></div>
					</div>
				@endif

				@if ($user->profile->relationship)
					<div class="my-1 text-center">
						<svg class="w-4 inline-block mr-2 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
						</svg>
						<span class="text-sm text-gray-700 font-semibold">{{ $user->profile->relationship }}</span>
					</div>
				@endif

				<div class="my-1 text-center">
					<svg class="w-4 inline-block mr-2 text-purple-600"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
					</svg>
					<span class="text-sm text-gray-700">Joined since <span class="font-semibold">{{ $user->created_at->format('M, Y') }}</span></span>
				</div>


				<a href="{{ route('profiles.show', ['profile' => $user->profile]) }}" class="my-1 text-center">
					<svg class="w-4 inline-block mr-2 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
					</svg>
					<div class="text-sm text-gray-700 inline-block">See more about <span class="font-semibold">{{ $user->name }}</span></div>
				</a>			
			</div>
		</div>
	</div>

	@cannot('can-follow', $user->profile)
		@error('newPost') 
			<div class="px-2 pb-1 text-red-500 text-xs">{{ $message }}</div>
		@enderror
		{{-- Create Post Form --}}
		<div class="bg-white rounded-md p-2 mb-2">
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
	@endcannot
	
	
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
		<x-profile-sidebar :user="$user" />
	</x-slot>
	{{-- End -> Sidebar --}}


	<x-slot name="rightbar">
		<div class="p-2">
			<h1 class="text-gray-700 text-lg font-bold mb-2">Followers ({{ number_format($user->profile->followers_count) }}) </h1>

			@forelse($user->profile->followers as $follower)
				<div class="w-full py-0.5 px-1 rounded-md mb-1">
					<div>
						<x-user-image size="xs" :user="$follower" />
						<x-user-name :user="$follower" />
					</div>
				</div>
			@empty
				<div class="bg-gray-100 p-2 rounded-md text-center my-3">No Followers</div>
			@endforelse	

			@if ($user->profile->followers_count)
			<a href="{{ route('user.followers', ['user' => $user->id]) }}" class="my-2 flex items-base focus:outline-none">
				<svg class="w-4 inline-block mr-2 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
				</svg>
				<div class="text-sm text-gray-700">See All Followers</div>
			</a>
			@endif

			<hr class="my-3">

			<h1 class="text-gray-700 text-lg font-bold mb-2">Followings ({{ number_format($user->followings_count) }}) </h1>

			@forelse($user->followings as $following)
				<div class="w-full py-0.5 px-1 rounded-md mb-1 ">
					<div>
						<x-user-image size="xs" :user="$following->user" />
						<x-user-name :user="$following->user" />
					</div>
				</div>
			@empty
				<div class="bg-gray-100 p-2 rounded-md text-center my-3">No Followings</div>
			@endforelse	

			@if ($user->followings_count)
			<a href="{{ route('user.followings', ['user' => $user->id]) }}" class="my-2 flex items-base focus:outline-none">
				<svg class="w-4 inline-block mr-2 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
				</svg>
				<div class="text-sm text-gray-700">See All Followings</div>
			</a>
			@endif
		</div>
	</x-slot>

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
