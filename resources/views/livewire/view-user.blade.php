<div class="w-full p-2 bg-gray-100 rounded-md hover:bg-gray-200 flex items-center mb-2">
	<div class="w-10"><x-user-image :user="$user" size="lg" /></div>
	
	<div class="w-full">
		<div class="w-full flex flex-col">
			<x-user-name :user="$user"/>
			<div class="text-xs">
				@if ($user->profile->work)
					<div class="flex items-base">
						@php
							$work = head($user->profile->work);
						@endphp
						<div class="text-sm text-gray-700 inline-block">Worked as <span class="font-semibold">{{ $work['position'] ?? '' }}
							</span> at <span class="font-semibold">{{ $work ['company']}}</span>
						</div>
					</div>
				@else
					@if ($user->profile->education)
						@php
							$education = head($user->profile->education);
						@endphp
						<div class="text-sm text-gray-700 inline-block">Studied <span class="font-semibold">{{ $education['program'] ?? '' }}
							</span> at <span class="font-semibold">{{ $education ['school']}}</span>
						</div>
					@endif
				@endif
			</div>
		</div>
	</div>

	<div >

		@can('can-follow', $user->profile)
			@if (!$follow)	
				<x-forms.icon-button text=" " :bordered="false" wire:click="follow">	
						<svg class="w-4 mr-2 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
						</svg>
				</x-forms.icon-button>
			@else
				<x-forms.icon-button text=" " :bordered="false" wire:click="unfollow">
						<svg class="w-4 mr-2 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7a4 4 0 11-8 0 4 4 0 018 0zM9 14a6 6 0 00-6 6v1h12v-1a6 6 0 00-6-6zM21 12h-6" />
						</svg>
				</x-forms.icon-button>
			@endif
		@endcan
	</div>
</div>
