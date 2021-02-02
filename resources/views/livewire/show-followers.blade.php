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
		<div class="flex items-center justify-between border-b border-gray-400 pb-2 mb-4">
			<h1 class="text-gray-700 md:text-lg text-sm font-bold">
				Followers <span class="text-xs text-gray-500">({{ $this->user->profile->followers_count }})</span>
			</h1>
			{{-- filter followers --}}
			<div class="w-44 rounded-md">
				<input type="text" class="w-full bg-gray-100 rounded-md focus:outline-none px-2 py-1" placeholder="Search follower...">
			</div>

			{{--  --}}
		</div>

		@foreach ($followers as $follower)
			<div class="w-full p-2 bg-gray-100 rounded-md hover:bg-gray-200 flex items-center mb-2">
				<div class="w-10"><x-user-image :user="$follower" size="lg" /></div>
				<div class="w-full flex items-center justify-between">
					<div class="w-full flex flex-col">
						<x-user-name :user="$follower"/>
						<div class="text-xs">
							@if ($follower->profile->work)
								<div class="flex items-base">
									@php
										$work = head($follower->profile->work);
									@endphp
									<div class="text-sm text-gray-700 inline-block">Worked as <span class="font-semibold">{{ $work['position'] ?? '' }}
										</span> at <span class="font-semibold">{{ $work ['company']}}</span>
									</div>
								</div>
							@else
								@if ($follower->profile->education)
									@php
										$education = head($follower->profile->education);
									@endphp
									<div class="text-sm text-gray-700 inline-block">Studied <span class="font-semibold">{{ $education['program'] ?? '' }}
										</span> at <span class="font-semibold">{{ $education ['school']}}</span>
									</div>
								@endif
							@endif
						</div>
					</div>
					@can('can-follow', $follower->profile)
						<livewire:follow-user :profile="$follower->profile" :icon="true" />
					@endcan
				</div>
			</div>
		@endforeach

		{{ $followers->links() }}
	</div>
	{{-- End -> show followers --}}

</div>
{{-- End  -> Main Section --}}
