@props(['user'])

<div class="py-2 w-full" wire:ignore>
	<img src="{{ asset('storage/profiles/'.$user->profileImage) }}" alt="Profile Image" class="rounded-full w-40 h-40 mx-auto">
</div>

<h1 class="text-lg font-bold text-center text-gray-700 mb-2">
		{{ $user->name }}
		@if($user->profile->nickname)
			<span class="text-sm">({{ $user->profile->nickname }})</span>
		@endif
</h1>

<div class="px-2 pb-2 text-sm rounded-md text-gray-600 text-center">
	"{{ $user->profile->bio }}""
</div>

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
<div class="p-2 my-1">
	@if ($user->profile->work)
		<div class="my-1 flex items-base">
			<svg class="w-4 inline-block mr-2 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
			  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
			</svg>
			@php
				$work = head($user->profile->work);
			@endphp
			<div class="text-sm text-gray-700 inline-block">Worked as <span class="font-semibold">{{ $work['position'] ?? '' }}</span> at <span class="font-semibold">{{ $work ['company']}}</span></div>
		</div>
	@endif
	

	@if ($user->profile->education)
		<div class="my-1 flex items-base">
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
		<div class="my-1 flex items-base">
			<svg class="w-4 inline-block mr-2 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
			  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
			  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
			</svg>
			<div class="text-sm text-gray-700">Lives in <span class="font-semibold">{{ $user->profile->location }}</span></div>
		</div>
	@endif

	@if ($user->profile->relationship)
		<div class="my-1 flex items-base">
			<svg class="w-4 inline-block mr-2 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
			  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
			</svg>
			<span class="text-sm text-gray-700 font-semibold">{{ $user->profile->relationship }}</span>
		</div>
	@endif

	<div class="my-1 flex items-base">
		<svg class="w-4 inline-block mr-2 text-purple-600"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
		  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
		</svg>
		<span class="text-sm text-gray-700">Joined since <span class="font-semibold">{{ $user->created_at->format('M, Y') }}</span></span>
	</div>


	<a href="#" class="my-1 flex items-base">
		<svg class="w-4 inline-block mr-2 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
		  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
		</svg>
		<div class="text-sm text-gray-700">See more about <span class="font-semibold">{{ $user->name }}</span></div>
	</a>			
</div>

{{-- End -> other profile info--}}

<hr class="my-2" />
<x-menu />