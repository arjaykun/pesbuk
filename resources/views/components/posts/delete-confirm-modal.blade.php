@props(['show'])

<x-modal id="confirmModal" x-ref="confirmModal" class="{{ $show? 'block' : 'hidden' }}">
  <h2 class="text-xl text-gray-700 font-bold">Delete Post</h2>
  <p class="text-md text-gray-500">Are you sure you want to delete this post?</p>
  <div class="grid grid-cols-2 gap-2 pt-5">
	  {{-- confirm button --}}
	  <x-forms.default-button class="bg-purple-700 border-purple-700 text-white border hover:bg-white hover:text-gray-700 w-full" wire:click="deletePost()">
			Delete
		</x-forms.default-button>
    {{-- cancel button --}}
    <x-forms.default-button class="border-gray-700 border" @click="$refs.confirmModal.classList.add('hidden')">
    	Cancel
 		</x-forms.default-button>
  </div>
</x-modal>
