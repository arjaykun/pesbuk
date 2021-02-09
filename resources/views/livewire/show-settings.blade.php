<div class="bg-white p-2 rounded-md w-full text-gray-700">
  <x-slot name="sidebar">
  	<div class="px-2">
	  	<h1 class="text-3xl font-extrabold text-purple-700 py-2">
			  Pes<span class="text-purple-500">buk</span><small class="text-purple-300">.com</small>
			</h1>

			<ul class="py-2 text-sm text-gray-700 font-semibold ">
			  <a href="#account_settings">
			  	<li class="px-2 bg-gray-100 py-1 rounded-md hover:bg-purple-500 my-1 hover:text-white">
				   	<svg class="w-4 inline-block mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
				    </svg>
			    	Account Settings
			  	</li>
				</a>
			</ul>
		</div>
  </x-slot>

  <div id="account_settings py-2">
  	<h2 class="mb-2 pb-2 text-purple-600 text-md font-bold">Account Settings</h2>

		@if ($errors->any())
	    <div class="mb-2">
	        <div class="font-medium text-red-600">{{ __('Whoops! Something went wrong.') }}</div>

	        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
		@endif

  	{{-- name --}}
		<div class="mt-0.5 mb-2 flex items-center">
			<div class="bg-gray-100 inline-block w-7 h-7 rounded-full flex items-center justify-center">
				<svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
				</svg>
			</div>

			<div class="relative w-full pl-3">
				<x-forms.label text="Name" class="absolute top-0 left-0 pl-5 pt-0.5 uppercase text-purple-500" size="xs" />
				<input type="text" class="w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-2 focus:outline-none" placeholder="Your Name" wire:model.defer="user.name" />
			</div>
		</div>

		{{-- email --}}
		<div class="mt-0.5 mb-2 flex items-center">
			<div class="bg-gray-100 inline-block w-7 h-7 rounded-full flex items-center justify-center">
				<svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
				</svg>
			</div>

			<div class="relative w-full pl-3">
				<x-forms.label text="e-mail" class="absolute top-0 left-0 pl-5 pt-0.5 uppercase text-purple-500" size="xs" />
				<input type="text" class="w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-2 focus:outline-none" placeholder="Your E-mail" wire:model.defer="user.email" />
			</div>
		</div>

		{{-- password --}}
		<div class="mt-0.5 mb-2 flex items-center">
			<div class="bg-gray-100 inline-block w-7 h-7 rounded-full flex items-center justify-center">
				<svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
				</svg>
			</div>

			<div class="relative w-full pl-3">
				<x-forms.label text="Current Password" class="absolute top-0 left-0 pl-5 pt-0.5 uppercase text-purple-500" size="xs" />
				<input type="password" class="w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-2 focus:outline-none" placeholder="Provide your current password for confirmation" wire:model.defer="password" />
			</div>
		</div>

		<p class="text-xs text-gray-500 py-1">
			<strong>FYI:</strong> Once account details is updated, you'll be forced logout for changes to reflect..
		</p>

		<div class="flex justify-end w-full mr-2 mt-1 mb-2 pb-2 border-b border-gray-300">
				<x-forms.save-button wire:click="updateAccount" />
		</div>

  </div>

</div>
