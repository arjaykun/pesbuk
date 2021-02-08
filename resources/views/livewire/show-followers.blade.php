{{-- Main Section --}}
<div x-data class="w-full">	

	{{-- loading overlay if wire:loading is true --}}
	<x-loading-overlay />

	{{-- Sidebar --}}
	<x-slot name="sidebar" >
	<x-profile-sidebar :user="$user" />
	</x-slot>
	{{-- End -> Sidebar --}}

	{{-- show followers --}}
	<div class="bg-white rounded-md p-2">
		<div class="flex items-center justify-between border-b border-gray-400 pb-2 mb-2">
			<h1 class="text-gray-700 md:text-lg text-sm font-bold">
				Followers <span class="text-xs text-gray-500">({{ $this->user->profile->followers_count }})</span>
			</h1>
			{{-- filter followers --}}
			<div class="w-44 rounded-md relative">
				<input type="text" class="w-full bg-gray-100 rounded-md focus:outline-none px-2 py-1" placeholder="Search follower..." wire:model.debounce.500ms="search">
				<button class="absolute right-1 top-0 mt-1 text-gray-500 focus:outline-none" type="submit">  
		      <svg class="w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
		        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
		      </svg>
		    </button>
			</div>

			{{--  --}}
		</div>

		@if (strlen(trim($this->search)) > 0)
			<p class="text-xs text-gray-500 mb-2">
				Search results for "{{ $this->search }}."
			</p>
		@endif
		

		@forelse ($followers as $follower)
			<livewire:view-user :user="$follower" :key="$follower->id" />
		@empty
			<div class="text-center block p-10 text-gray-700 text-2xl">No followers found.</div>
		@endforelse

		{{ $followers->links() }}
	</div>
	{{-- End -> show followers --}}

</div>
{{-- End  -> Main Section --}}
