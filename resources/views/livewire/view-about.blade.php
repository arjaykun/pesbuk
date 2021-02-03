<div class="w-full">
	
	{{-- Sidebar --}}
	<x-slot name="sidebar" >
		<x-profile-sidebar :user="$profile->user" />
	</x-slot>
	{{-- End -> Sidebar --}}

	<div class="bg-white rounded-md p-2">
		<h1 class="text-xl text-gray-700 font-bold border-b border-gray-300 pb-2 mb-2">More about {{ $profile->user->name }}</h1>

		
		{{-- Basic Info --}}

		<h2 class="text-lg text-gray-700 font-bold">Basic Info</h2>

		<div class="mt-0.5 mb-2 flex items-center">
			<div class="bg-gray-100 inline-block w-7 h-7 rounded-full flex items-center justify-center">
				<svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
				</svg>
			</div>

			<div class="relative w-full pl-3">
				<x-forms.label text="gender" class="absolute top-0 left-0 pl-5 pt-0.5 uppercase text-purple-500" size="xs" />
				<div class="pl-2 w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-1">
					{{ $profile->gender ?? "N/A" }}
				</div>
			</div>
		</div>

		<div class="mt-0.5 mb-2 flex items-center">
			<div class="bg-gray-100 inline-block w-7 h-7 rounded-full flex items-center justify-center">
				<svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
				</svg>
			</div>

			<div class="relative w-full pl-3">
				<x-forms.label text="relationship" class="absolute top-0 left-0 pl-5 pt-0.5 uppercase text-purple-500" size="xs" />
				<div class="pl-2 w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-1">
					{{ $profile->relationship ?? "N/A" }}
				</div>
			</div>
		</div>

		<div class="mt-0.5 mb-2 flex items-center">
			<div class="bg-gray-100 inline-block w-7 h-7 rounded-full flex items-center justify-center">
				<svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
				</svg>
			</div>

			<div class="relative w-full pl-3">
				<x-forms.label text="nickname" class="absolute top-0 left-0 pl-5 pt-0.5 uppercase text-purple-500" size="xs" />
				<div class="pl-2 w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-1">
					{{ $profile->nickname ?? "N/A" }}
				</div>
			</div>
		</div>

		<div class="mt-0.5 mb-2 flex items-center">
			<div class="bg-gray-100 inline-block w-7 h-7 rounded-full flex items-center justify-center">
				<svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
				</svg>
			</div>

			<div class="relative w-full pl-3">
				<x-forms.label text="Mobile #" class="absolute top-0 left-0 pl-5 pt-0.5 uppercase text-purple-500" size="xs" />
				<div class="pl-2 w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-1">
					{{ $profile->mobile ?? "N/A" }}
				</div>
			</div>
	
		</div>

		<div class="mt-0.5 mb-2 flex items-center">
			<div class="bg-gray-100 inline-block w-7 h-7 rounded-full flex items-center justify-center">
				<svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
				</svg>
			</div>

			<div class="relative w-full pl-3">
				<x-forms.label text="Website" class="absolute top-0 left-0 pl-5 pt-0.5 uppercase text-purple-500" size="xs" />
				<div class="pl-2 w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-1">
					{{ $profile->website ?? "N/A" }}
				</div>
			</div>
		</div>

		<div class="mt-0.5 mb-2 flex items-center">
			<div class="bg-gray-100 inline-block w-7 h-7 rounded-full flex items-center justify-center">
				<svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
				</svg>
			</div>

			<div class="relative w-full pl-3">
				<x-forms.label text="location" class="absolute top-0 left-0 pl-5 pt-0.5 uppercase text-purple-500" size="xs" />
				<div class="pl-2 w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-1">
					{{ $profile->location ?? "N/A" }}
				</div>
			</div>
		</div>

		{{-- End -> Basic Info --}}

		{{-- Education --}}
		<h2 class="text-lg text-gray-700 font-bold">Education</h2>

		@forelse ($profile->education ?? [] as $key => $educArray)
			<div class="flex items-center">
				<div class="bg-gray-100 inline-block w-7 h-7 rounded-full flex items-center justify-center">
					<svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					  <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
					  <path fill="#fff" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
					</svg>
				</div> 

				<div class="w-full my-1 px-2 py-0.5 rounded-md text-sm bg-gray-100 text-gray-600 ml-3">
					Studied {{ $educArray['program'] ?? '' }} at <strong>{{ $educArray['school'] }}</strong>
					@if(Arr::exists($educArray, 'from') && Arr::exists($educArray, 'to'))
						<span class="text-xs text-gray-500 block">{{$educArray['from']}} - {{ date('Y') == $educArray['to'] ? 'Present' : $educArray['to'] }} </span>
					@endif
				</div>
		 </div>
		@empty
			<div class="text-sm text-gray-600 block pl-10">No data given.</div>
		@endforelse
		{{-- End -> Education --}}

		{{-- Work --}}
		<h2 class="text-lg text-gray-700 font-bold">Work</h2>

		@forelse ($profile->work ?? [] as $key => $workArray)
			<div class="flex items-center">
				<div class="bg-gray-100 inline-block w-7 h-7 rounded-full flex items-center justify-center">
					<svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
					</svg>
				</div>
				<div class="w-full my-1 px-2 py-0.5 rounded-md text-sm bg-gray-100 text-gray-600 ml-3">
					{{ $workArray['position'] }} at <strong>{{ $workArray['company'] }}</strong>
					@if(Arr::exists($workArray, 'from') && Arr::exists($workArray, 'to'))
						<span class="text-xs text-gray-500 block">{{$workArray['from']}} - {{ date('Y') == $workArray['to'] ? 'Present' : $workArray['to'] }} </span>
					@endif
				</div>
		 </div>
		@empty
			<div class="text-sm py-2 text-gray-600 block pl-10">No data given.</div>
		@endforelse
		{{-- End -> Work --}}
	</div>
</div>
