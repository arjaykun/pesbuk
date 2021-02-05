{{-- Main Section --}}
<div x-data class="w-full">	

	{{-- loading overlay if wire:loading is true --}}
	<x-loading-overlay />

	{{-- show people --}}
	<div class="bg-white rounded-md p-2">
		<div class="flex items-center border-b border-gray-400 pb-2 mb-2">
			<a href="{{ route('search', ['q' => $q]) }}" class="p-2 bg-gray-200 rounded-md text-gray-700 mr-2">All</a>
			<a href="{{ route('search.people', ['q' => $q]) }}" class="p-2 bg-purple-600 rounded-md text-gray-100 mr-2">People</a>
			<a href="#" class="p-2 bg-gray-200 rounded-md text-gray-700">Posts</a>
		</div>

	  <input type="text" wire:model.lazy="q"  placeholder="Search here..." class="w-full bg-gray-200 rounded-md py-0.5 px-2">


		@if (strlen(trim($q)) > 0)
			<p class="text-xs text-gray-500 mb-2">Search results for "{{ $q }}."</p>
		@else
			<p class="text-xs text-gray-500 mb-2">No search text found! Pleast try again.</p>
		@endif

		@forelse ($users as $user)
			<livewire:view-user :user="$user" :key="$user->id" />
		@empty
			@if ($q)
				<div class="text-center block p-10 text-gray-700 text-2xl">No Users found.</div>
			@endif
		@endforelse
	</div>

	@if (count($users) == $limit)
		<button wire:click="seeMorePeople" class="w-full block text-center text-gray-600 text-sm focus:outline-none bg-white py-1 rounded-md mt-2">See more people...</button>
	@else 
		<div class="w-full block text-center text-gray-600 text-sm focus:outline-none bg-white py-1 rounded-md mt-1">End of search...</div>
	@endif
	{{-- End -> show people --}}

</div>
{{-- End  -> Main Section --}}
