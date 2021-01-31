<div class="w-full">
	<x-slot name="sidebar"></x-slot>

	<div class="bg-white rounded-md p-2">
		<h1 class="text-xl text-gray-700 font-bold border-b-2 border-gray-300 pb-2 mb-2">Edit Profile</h1>
		{{-- Bio --}}
		<div class="mb-1">
			<svg class="inline-block w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
			  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
			</svg>
			<x-forms.label text="Bio" />
		</div>
		<textarea class="resize-none w-full h-20 bg-gray-200 p-2 rounded-md border-b-2 border-gray-200 focus:bg-gray-100" placeholder="Tell us something about yourself. Maximum of 500 characters."></textarea>

		<div class="flex justify-end w-full mr-2 mt-1 mb-2 pb-2 border-b border-gray-300">
			<x-forms.icon-button text="Save" class="px-2 py-1 text-gray-500" :bordered="true">
				<svg class="w-6 mr-2 text" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
				  <path d="M7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V6h5a2 2 0 012 2v7a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2h5v5.586l-1.293-1.293zM9 4a1 1 0 012 0v2H9V4z" />
				</svg>
			</x-forms.icon-button> 
		</div>
		{{-- End -> Bio --}}

		{{-- Basic Info --}}

		<h2 class="text-lg text-gray-700 font-bold">Basic Info</h2>

		<div class="my-2 flex items-center">
			<div class="bg-gray-100 inline-block w-7 h-7 rounded-full flex items-center justify-center">
				<svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
				</svg>
			</div>

			<div class="relative w-full pl-3">
				<x-forms.label text="Gender" class="absolute top-0 left-0 pl-5 pt-0.5 uppercase text-purple-500" size="xs" />
				<select class="w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-1 appearance-none">
					<option value="Male" class="bg-gray-200 rounded-md">Male</option>
					<option value="Female" class="bg-gray-200 rounded-md">Female</option>
					<option value="Secret" class="bg-gray-200 rounded-md">Secret</option>
				</select>
			</div>
		</div>

		<div class="my-2 flex items-center">
			<div class="bg-gray-100 inline-block w-7 h-7 rounded-full flex items-center justify-center">
				<svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
				</svg>
			</div>

			<div class="relative w-full pl-3">
				<x-forms.label text="Relationship" class="absolute top-0 left-0 pl-5 pt-0.5 uppercase text-purple-500" size="xs" />
				<select class="w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-1 appearance-none">
					<option value="In relationship" class="bg-gray-200 rounded-md">In relationship</option>
					<option value="Married" class="bg-gray-200 rounded-md">Married</option>
					<option value="Single" class="bg-gray-200 rounded-md">Single</option>
					<option value="It's complicated" class="bg-gray-200 rounded-md">It's complicated</option>
					<option value="Open for dating" class="bg-gray-200 rounded-md">Open for dating</option>
				</select>
			</div>
		</div>

		<div class="my-2 flex items-center">
			<div class="bg-gray-100 inline-block w-7 h-7 rounded-full flex items-center justify-center">
				<svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
				</svg>
			</div>

			<div class="relative w-full pl-3">
				<x-forms.label text="Nickname" class="absolute top-0 left-0 pl-5 pt-0.5 uppercase text-purple-500" size="xs" />
				<input type="text" class="w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-2" placeholder="Nickname" />
			</div>
		</div>

		<div class="my-2 flex items-center">
			<div class="bg-gray-100 inline-block w-7 h-7 rounded-full flex items-center justify-center">
				<svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
				</svg>
			</div>

			<div class="relative w-full pl-3">
				<x-forms.label text="Mobile #" class="absolute top-0 left-0 pl-5 pt-0.5 uppercase text-purple-500" size="xs" />
				<input type="text" class="w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-2" placeholder="E.g 09369206074" />
			</div>
		</div>

		<div class="my-2 flex items-center">
			<div class="bg-gray-100 inline-block w-7 h-7 rounded-full flex items-center justify-center">
				<svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
				</svg>
			</div>

			<div class="relative w-full pl-3">
				<x-forms.label text="Location" class="absolute top-0 left-0 pl-5 pt-0.5 uppercase text-purple-500" size="xs" />
				<input type="text" class="w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-2" placeholder="Where do you live?" />
			</div>
		</div>

		<div class="flex justify-end w-full mr-2 mt-1 mb-2 pb-2 border-b border-gray-300">
			<x-forms.icon-button text="Save" class="px-2 py-1 text-gray-500" :bordered="true">
				<svg class="w-6 mr-2 text" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
				  <path d="M7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V6h5a2 2 0 012 2v7a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2h5v5.586l-1.293-1.293zM9 4a1 1 0 012 0v2H9V4z" />
				</svg>
			</x-forms.icon-button> 
		</div>
		{{-- End -> Basic Info --}}

		{{-- Education --}}
		<h2 class="text-lg text-gray-700 font-bold">Education</h2>

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
				<input type="text" class="w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-2" placeholder="School Name" />
			</div>
		</div>

		<div class="my-2 ml-7">
			<div class="relative w-full pl-3">
				<x-forms.label text="Program" class="absolute top-0 left-0 pl-5 pt-0.5 uppercase text-purple-500" size="xs" />
				<input type="text" class="w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-2" placeholder="E.g. Bachelors of Science in Information Technology" />
			</div>
		</div>		

		<div class="my-2 ml-10 grid grid-cols-2 gap-0.5 items-center">
			<div class="relative">
				<x-forms.label text="From" class="absolute top-0 left-0 pl-2 pt-0.5 uppercase text-purple-500" size="xs" />
				<input type="text" class="w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-2" placeholder="E.g. 2004" />
			</div>

			<div class="relative">
				<x-forms.label text="To" class="absolute top-0 left-0 pl-2 pt-0.5 uppercase text-purple-500" size="xs" />
				<input type="text" class="w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-2" placeholder="E.g. 2008" />
			</div>
		</div>


		<div class="flex justify-end w-full mr-2 mt-1 mb-2 pb-2 border-b border-gray-300">
			<x-forms.icon-button text="Save" class="px-2 py-1 text-gray-500" :bordered="true">
				<svg class="w-6 mr-2 text" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
				  <path d="M7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V6h5a2 2 0 012 2v7a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2h5v5.586l-1.293-1.293zM9 4a1 1 0 012 0v2H9V4z" />
				</svg>
			</x-forms.icon-button> 
		</div>
		{{-- End -> Education --}}

		{{-- Work --}}
		<h2 class="text-lg text-gray-700 font-bold">Work</h2>

		<div class="my-2 flex items-center">
			<div class="bg-gray-100 inline-block w-7 h-7 rounded-full flex items-center justify-center">
				<svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
				</svg>
			</div>

			<div class="relative w-full pl-3">
				<x-forms.label text="Company Name" class="absolute top-0 left-0 pl-5 pt-0.5 uppercase text-purple-500" size="xs" />
				<input type="text" class="w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-2" placeholder="Company Name" />
			</div>
		</div>

		<div class="my-2 ml-7">
			<div class="relative w-full pl-3">
				<x-forms.label text="Job/ Position" class="absolute top-0 left-0 pl-5 pt-0.5 uppercase text-purple-500" size="xs" />
				<input type="text" class="w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-2" placeholder="E.g. Web Developer" />
			</div>
		</div>		

		<div class="my-2 ml-10 grid grid-cols-2 gap-0.5 items-center">
			<div class="relative">
				<x-forms.label text="From" class="absolute top-0 left-0 pl-2 pt-0.5 uppercase text-purple-500" size="xs" />
				<input type="text" class="w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-2" placeholder="E.g. 2004" />
			</div>

			<div class="relative">
				<x-forms.label text="To" class="absolute top-0 left-0 pl-2 pt-0.5 uppercase text-purple-500" size="xs" />
				<input type="text" class="w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-2" placeholder="E.g. 2008" />
			</div>
		</div>


		<div class="flex justify-end w-full mr-2 mt-1 mb-2 pb-2">
			<x-forms.icon-button text="Save" class="px-2 py-1 text-gray-500" :bordered="true">
				<svg class="w-6 mr-2 text" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
				  <path d="M7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V6h5a2 2 0 012 2v7a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2h5v5.586l-1.293-1.293zM9 4a1 1 0 012 0v2H9V4z" />
				</svg>
			</x-forms.icon-button> 
		</div>
		{{-- End -> Work --}}
	</div>
</div>
