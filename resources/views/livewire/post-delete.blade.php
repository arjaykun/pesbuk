<div>
	
	<form @submit.prevent="Livewire.emit('deletePost', $refs.postId.value);" method="POST" class="w-full">
		
		<input type="hidden" id="delete_post_id" x-ref="postId">

	  {{-- confirm button --}}
	  <x-forms.default-button class="bg-purple-700 border-purple-700 text-white border hover:bg-white hover:text-gray-700 w-full" type="submit" wire:loading.attr="disabled">Proceed</x-forms.default-button>

	</form>

</div>