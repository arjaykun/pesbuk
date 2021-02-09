<div class="bg-white p-2 rounded-md w-full text-gray-700">
  <x-slot name="sidebar">
  	<div class="px-2">
	  	<h1 class="text-3xl font-extrabold text-purple-700 py-2">
			  Pes<span class="text-purple-500">buk</span><small class="text-purple-300">.com</small>
			</h1>

			<ul class="py-2 text-sm text-gray-700 font-semibold ">
			  <a href="#account_settings">
			  	<li class="px-2 bg-gray-100 py-1 rounded-md hover:bg-purple-500 my-1 hover:text-white">	  
			    	Account Settings
			  	</li>
				</a>
				<a href="#change_password">
			  	<li class="px-2 bg-gray-100 py-1 rounded-md hover:bg-purple-500 my-1 hover:text-white">
			    	Change Password
			  	</li>
				</a>
				<a href="#themes">
			  	<li class="px-2 bg-gray-100 py-1 rounded-md hover:bg-purple-500 my-1 hover:text-white">
			    	Themes
			  	</li>
				</a>
			</ul>
		</div>
  </x-slot>

  <div id="account_settings">
  	<h2 class="mb-2 pb-2 text-purple-600 text-md font-bold">Account Settings</h2>

		@error('user.name') <span class="text-red-500 text-sm block">{{ $message }}</span> @enderror
		@error('user.email') <span class="text-red-500 text-sm block">{{ $message }}</span> @enderror
		@error('password') <span class="text-red-500 text-sm block">{{ $message }}</span> @enderror

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

		<div class="flex justify-end w-full mr-2 mt-1 mb-2 pb-2 border-b border-gray-300">
				<x-forms.save-button wire:click="updateAccount" />
		</div>
  </div>

  <div id="change_password">
  	<h2 class="mb-2 pb-2 text-purple-600 text-md font-bold">Change Password</h2>

  	@error('passwords.password') <span class="text-red-500 text-sm block">{{ $message }}</span> @enderror
		@error('passwords.password_confirmation') <span class="text-red-500 text-sm block">{{ $message }}</span> @enderror
		@error('passwords.old_password') <span class="text-red-500 text-sm block">{{ $message }}</span> @enderror


  	{{-- password 1 --}}
		<div class="mt-0.5 mb-2 flex items-center">
			<div class="bg-gray-100 inline-block w-7 h-7 rounded-full flex items-center justify-center">
				<svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
				</svg>
			</div>

			<div class="relative w-full pl-3">
				<x-forms.label text="New Password" class="absolute top-0 left-0 pl-5 pt-0.5 uppercase text-purple-500" size="xs" />
				<input type="password" class="w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-2 focus:outline-none" placeholder="Your new password" wire:model.defer="passwords.password" />
			</div>
		</div>

		{{-- password 2 --}}
		<div class="mt-0.5 mb-2 flex items-center">
			<div class="bg-gray-100 inline-block w-7 h-7 rounded-full flex items-center justify-center">
				<svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
				</svg>
			</div>

			<div class="relative w-full pl-3">
				<x-forms.label text="Confirm Password" class="absolute top-0 left-0 pl-5 pt-0.5 uppercase text-purple-500" size="xs" />
				<input type="password" class="w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-2 focus:outline-none" placeholder="Re-type your new password again" wire:model.defer="passwords.password_confirmation" />
			</div>
		</div>


		{{-- current password --}}
		<div class="mt-0.5 mb-2 flex items-center">
			<div class="bg-gray-100 inline-block w-7 h-7 rounded-full flex items-center justify-center">
				<svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
				</svg>
			</div>

			<div class="relative w-full pl-3">
				<x-forms.label text="Old Password" class="absolute top-0 left-0 pl-5 pt-0.5 uppercase text-purple-500" size="xs" />
				<input type="password" class="w-full text-sm bg-gray-100 pt-4 pb-0.5 rounded-md px-2 focus:outline-none" placeholder="Provide your current password for confirmation" wire:model.defer="passwords.old_password" />
			</div>
		</div>

		<div class="flex justify-end w-full mr-2 mt-1 mb-2 pb-2 border-b border-gray-300">
				<x-forms.save-button wire:click="updatePassword" />
		</div>

	</div>


</div>
