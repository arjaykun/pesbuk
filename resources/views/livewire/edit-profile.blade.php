<div class="w-full">
	
	{{-- Sidebar --}}
	<x-slot name="sidebar" >
		<x-profile-sidebar :user="$profile->user" />
	</x-slot>
	{{-- End -> Sidebar --}}

	<div class="bg-white rounded-md p-2">
		<h1 class="text-xl text-gray-700 font-bold border-b-2 border-gray-300 pb-2 mb-2">Edit Profile</h1>

		@if (session()->has('msg_bio'))
			<div class="text-green-600 text-xs py-1">{{ session('msg_bio') }}</div>
		@endif

		{{-- Bio --}}
		@error('bio') <div class="text-red-500 text-xs">{{ $message }}</div> @enderror
		<div class="mb-1">
			<svg class="inline-block w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
			  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
			</svg>
			<x-forms.label text="Bio" />
		</div>

		<textarea class="resize-none w-full h-20 bg-gray-200 p-2 rounded-md border-b-2 border-gray-200 focus:bg-gray-100" placeholder="Tell us something about yourself. Maximum of 500 characters." wire:model.defer="bio"></textarea>

		<div class="flex justify-end w-full mr-2 mt-1 mb-2 pb-2 border-b border-gray-300">
			<x-forms.save-button wire:click="updateBio" target="updateBio" />
		</div>
		{{-- End -> Bio --}}

		{{-- Basic Info --}}

		<h2 class="text-lg text-gray-700 font-bold">Basic Info</h2>
		@if (session()->has('msg_basic'))
			<div class="text-green-600 text-xs py-1">{{ session('msg_basic') }}</div>
		@endif
		@error('basic.gender') <div class="text-red-500 text-xs ml-10">{{ $message }}</div> @enderror
		<div class="mt-0.5 mb-2 flex items-center">
			<div class="bg-gray-100 inline-block w-7 h-7 rounded-full flex items-center justify-center">
				<svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
				</svg>
			</div>

			<div class="relative w-full pl-3">
				<x-forms.label text="Gender" class="absolute top-0 left-0 pl-5 pt-0.5 uppercase text-purple-500" size="xs" />
				<svg class="absolute top:0 right-0 w-6 h-6 text-gray-500 mt-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
				</svg>
				<select class="w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-1 appearance-none" wire:model.defer="basic.gender">
					<option value="Male" class="bg-gray-200 rounded-md">Male</option>
					<option value="Female" class="bg-gray-200 rounded-md">Female</option>
					<option value="Secret" class="bg-gray-200 rounded-md">Secret</option>
				</select>
			</div>
		</div>

		@error('basic.relationship') <div class="text-red-500 text-xs ml-10">{{ $message }}</div> @enderror
		<div class="mt-0.5 mb-2 flex items-center">
			<div class="bg-gray-100 inline-block w-7 h-7 rounded-full flex items-center justify-center">
				<svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
				</svg>
			</div>

			<div class="relative w-full pl-3">
				<x-forms.label text="Relationship" class="absolute top-0 left-0 pl-5 pt-0.5 uppercase text-purple-500" size="xs" />
				<svg class="absolute top:0 right-0 w-6 h-6 text-gray-500 mt-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
				</svg>
				<select class="w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-1 appearance-none z-20" wire:model.defer="basic.relationship">
					<option value="In relationship" class="bg-gray-200 rounded-md">In relationship</option>
					<option value="Married" class="bg-gray-200 rounded-md">Married</option>
					<option value="Single" class="bg-gray-200 rounded-md">Single</option>
					<option value="Divorced" class="bg-gray-200 rounded-md">Divorced</option>
					<option value="Engaged" class="bg-gray-200 rounded-md">Engaged</option>
					<option value="Annuled" class="bg-gray-200 rounded-md">Annuled</option>
					<option value="It's complicated" class="bg-gray-200 rounded-md">It's complicated</option>
					<option value="Open for dating" class="bg-gray-200 rounded-md">Open for dating</option>
				</select>
			</div>
		</div>

		@error('basic.nickname') <div class="text-red-500 text-xs ml-10">{{ $message }}</div> @enderror
		<div class="mt-0.5 mb-2 flex items-center">
			<div class="bg-gray-100 inline-block w-7 h-7 rounded-full flex items-center justify-center">
				<svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
				</svg>
			</div>

			<div class="relative w-full pl-3">
				<x-forms.label text="Nickname" class="absolute top-0 left-0 pl-5 pt-0.5 uppercase text-purple-500" size="xs" />
				<input type="text" class="w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-2" placeholder="Nickname" wire:model.defer="basic.nickname" />
			</div>
		</div>

		@error('basic.mobile') <div class="text-red-500 text-xs ml-10">{{ $message }}</div> @enderror
		<div class="mt-0.5 mb-2 flex items-center">
			<div class="bg-gray-100 inline-block w-7 h-7 rounded-full flex items-center justify-center">
				<svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
				</svg>
			</div>

			<div class="relative w-full pl-3">
				<x-forms.label text="Mobile #" class="absolute top-0 left-0 pl-5 pt-0.5 uppercase text-purple-500" size="xs" />
				<input type="text" class="w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-2" placeholder="E.g 09369206074" wire:model.defer="basic.mobile" />
			</div>
		</div>

		@error('basic.website') <div class="text-red-500 text-xs ml-10">{{ $message }}</div> @enderror
		<div class="mt-0.5 mb-2 flex items-center">
			<div class="bg-gray-100 inline-block w-7 h-7 rounded-full flex items-center justify-center">
				<svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
				</svg>
			</div>

			<div class="relative w-full pl-3">
				<x-forms.label text="Website" class="absolute top-0 left-0 pl-5 pt-0.5 uppercase text-purple-500" size="xs" />
				<input type="text" class="w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-2" placeholder="E.g https://www.pesbuk.com" wire:model.defer="basic.website" />
			</div>
		</div>

		@error('basic.location') <div class="text-red-500 text-xs ml-10">{{ $message }}</div> @enderror
		<div class="mt-0.5 mb-2 flex items-center">
			<div class="bg-gray-100 inline-block w-7 h-7 rounded-full flex items-center justify-center">
				<svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
				</svg>
			</div>

			<div class="relative w-full pl-3">
				<x-forms.label text="Location" class="absolute top-0 left-0 pl-5 pt-0.5 uppercase text-purple-500" size="xs" />
				<input type="text" class="w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-2" placeholder="Where do you live?" wire:model.defer="basic.location" />
			</div>
		</div>

		<div class="flex justify-end w-full mr-2 mt-1 mb-2 pb-2 border-b border-gray-300">
				<x-forms.save-button wire:click="updateBasicInfo" />
		</div>
		{{-- End -> Basic Info --}}

		{{-- Education --}}
		<h2 class="text-lg text-gray-700 font-bold">Education</h2>
		@if (session()->has('msg_education'))
			<div class="text-green-600 text-xs py-1 ml-10">{{ session('msg_education') }}</div>
		@endif
		@error('newEducation.school') <div class="text-red-500 text-xs ml-10">{{ $message }}</div> @enderror
		@error('newEducation.program') <div class="text-red-500 text-xs ml-10">{{ $message }}</div> @enderror
		@error('newEducation.from') <div class="text-red-500 text-xs ml-10">{{ $message }}</div> @enderror
		@error('newEducation.to') <div class="text-red-500 text-xs ml-10">{{ $message }}</div> @enderror
			
		@foreach ($education as $key => $educArray)
			<div class="flex items-center">
				 <button class="bg-red-400 inline-block w-7 h-7 rounded-full flex items-center justify-center focus:outline-none" wire:click="removeEducation({{$key}})" wire:loading.attr="disabled" wire:target="removeEducation">
					<svg class="w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
	  					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
					</svg>
				</button>

				<div class="w-full my-1 px-2 py-0.5 rounded-md text-sm bg-purple-300 text-gray-600 ml-3">
					Studied {{ $educArray['program'] ?? '' }} at <strong>{{ $educArray['school'] }}</strong>
					@if(Arr::exists($educArray, 'from') && Arr::exists($educArray, 'to'))
						<span class="text-xs text-gray-500 block">{{$educArray['from']}} - {{ date('Y') == $educArray['to'] ? 'Present' : $educArray['to'] }} </span>
					@endif
				</div>
		 </div>
		@endforeach

		<div class="my-2 flex items-center">
			<div class="bg-gray-100 inline-block w-7 h-7 rounded-full flex items-center justify-center">
				<svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
				  <path fill="#fff" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
				</svg>
			</div>

			<div class="relative w-full pl-3">
				<x-forms.label text="School Name" class="absolute top-0 left-0 pl-5 pt-0.5 uppercase text-purple-500" size="xs" />
				<input type="text" class="w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-2" placeholder="School Name" wire:model.defer="newEducation.school" />
			</div>
		</div>

		<div class="my-2 ml-7">
			<div class="relative w-full pl-3">
				<x-forms.label text="Program (optional)" class="absolute top-0 left-0 pl-5 pt-0.5 uppercase text-purple-500" size="xs" />
				<input type="text" class="w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-2" placeholder="E.g. Bachelors of Science in Information Technology" wire:model.defer="newEducation.program" />
			</div>
		</div>		

		<div class="my-2 ml-10 grid grid-cols-2 gap-0.5 items-center">
			<div class="relative">
				<x-forms.label text="Year from (optional)" class="absolute top-0 left-0 pl-2 pt-0.5 uppercase text-purple-500" size="xs" />
				<input type="text" class="w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-2" placeholder="E.g. 2004" wire:model.defer="newEducation.from"/>
			</div>

			<div class="relative">
				<x-forms.label text="Year to (optional)" class="absolute top-0 left-0 pl-2 pt-0.5 uppercase text-purple-500" size="xs" />
				<input type="text" class="w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-2" placeholder="E.g. 2008" wire:model.defer="newEducation.to" />
			</div>
		</div>


		<div class="flex justify-end w-full mr-2 mt-1 mb-2 pb-2 border-b border-gray-300">
			<x-forms.save-button wire:click="updateEducation" />
		</div>
		{{-- End -> Education --}}

		{{-- Work --}}
		<h2 class="text-lg text-gray-700 font-bold">Work</h2>

		@if (session()->has('msg_work'))
			<div class="text-green-600 text-xs py-1 ml-10">{{ session('msg_work') }}</div>
		@endif
		@error('newWork.company') <div class="text-red-500 text-xs ml-10">{{ $message }}</div> @enderror
		@error('newWork.position') <div class="text-red-500 text-xs ml-10">{{ $message }}</div> @enderror
		@error('newWork.from') <div class="text-red-500 text-xs ml-10">{{ $message }}</div> @enderror
		@error('newWork.to') <div class="text-red-500 text-xs ml-10">{{ $message }}</div> @enderror

		@foreach ($work as $key => $workArray)
			<div class="flex items-center">
				 <button class="bg-red-400 inline-block w-7 h-7 rounded-full flex items-center justify-center focus:outline-none" wire:click="removeWork({{$key}})" wire:loading.attr="disabled" wire:target="removeWork">
					<svg class="w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
	  					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
					</svg>
				</button>

				<div class="w-full my-1 px-2 py-0.5 rounded-md text-sm bg-purple-300 text-gray-600 ml-3">
					{{ $workArray['position'] }} at <strong>{{ $workArray['company'] }}</strong>
					@if(Arr::exists($workArray, 'from') && Arr::exists($workArray, 'to'))
						<span class="text-xs text-gray-500 block">{{$workArray['from']}} - {{ date('Y') == $workArray['to'] ? 'Present' : $workArray['to'] }} </span>
					@endif
				</div>
		 </div>
		@endforeach

		<div class="my-2 flex items-center">
			<div class="bg-gray-100 inline-block w-7 h-7 rounded-full flex items-center justify-center">
				<svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
				</svg>
			</div>

			<div class="relative w-full pl-3">
				<x-forms.label text="Company Name" class="absolute top-0 left-0 pl-5 pt-0.5 uppercase text-purple-500" size="xs" />
				<input type="text" class="w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-2" placeholder="Company Name" wire:model.defer="newWork.company" />
			</div>
		</div>

		<div class="my-2 ml-7">
			<div class="relative w-full pl-3">
				<x-forms.label text="Position" class="absolute top-0 left-0 pl-5 pt-0.5 uppercase text-purple-500" size="xs" />
				<input type="text" class="w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-2" placeholder="E.g. Web Developer" wire:model.defer="newWork.position" />
			</div>
		</div>		

		<div class="my-2 ml-10 grid grid-cols-2 gap-0.5 items-center">
			<div class="relative">
				<x-forms.label text="Year from (optional)" class="absolute top-0 left-0 pl-2 pt-0.5 uppercase text-purple-500" size="xs" />
				<input type="text" class="w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-2" placeholder="E.g. 2004" wire:model.defer="newWork.from" />
			</div>

			<div class="relative">
				<x-forms.label text="Year to (optional)" class="absolute top-0 left-0 pl-2 pt-0.5 uppercase text-purple-500" size="xs" />
				<input type="text" class="w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-2" placeholder="E.g. 2008" wire:model.defer="newWork.to" />
			</div>
		</div>


		<div class="flex justify-end w-full mr-2 mt-1 mb-2 pb-2">
			<x-forms.save-button wire:click="updateWork" />
		</div>
		{{-- End -> Work --}}
	</div>
</div>
