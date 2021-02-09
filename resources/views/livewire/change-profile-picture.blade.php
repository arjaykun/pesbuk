<div>
  
	<div class="bg-white rounded-md p-2">
		<h1 class="text-gray-600 text-xl text-bold mb-4">Change Profile Image</h1>

		<img src="{{ $image ? $image->temporaryUrl() : asset('storage/profiles/'.$user->profileImage) }}" alt="Profile Image" class="w-40 h-40 mx-auto">

		@error('image') <div class="text-red-500 text-sm text-center w-full" >{{ $message }}</div> @enderror

		@if (session()->has('success') )
			<div class="text-green-500 text-center w-full">{{ session('success') }}</div>
		@endif

		<div class="text-center w-full" wire:loading.delay wire:target="image">Image loading...</div>
		<div class="text-center w-full" wire:loading.delay wire:target="save">Uploading...</div>

		<form wire:submit.prevent="save" class="flex items-center justify-center mt-2">
			<div class="bg-gray-500 rounded-md text-white relative font-semibold w-20 cursor-pointer mr-2 overflow-hidden">	
				<div class="absolute w-full text-center z-0 p-2 cursor-pointer">Browse</div>		
    		<input type="file" wire:model="image" class="w-full h-full opacity-0 z-10 p-2">
			</div>

	    <button type="submit" class="p-2 bg-purple-500 rounded-md text-white flex items-centers" wire:loading.attr="disabled">
	    	Upload
		    <svg class="w-6 ml-1 text-white inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
				  <path d="M7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V6h5a2 2 0 012 2v7a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2h5v5.586l-1.293-1.293zM9 4a1 1 0 012 0v2H9V4z" />
				</svg>
	    </button>
		</form>

	</div>


</div>
