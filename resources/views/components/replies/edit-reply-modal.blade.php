@props(['show'])

<x-modal x-ref="editReplyModal" class="{{ $show? 'flex' : 'hidden' }}">
	<h2 class="text-xl text-gray-700 font-bold">Update Reply</h2>
	<p class="pb-2">Change the your old reply below to update it.</p>

	<textarea class="w-full h-12 p-2 rounded bg-gray-200 resize-none" wire:model.defer="editReply"></textarea>

	<div class="grid grid-cols-2 gap-2 pt-5">
	  {{-- confirm button --}}
	  <x-forms.default-button type="submit" class="bg-purple-700 border-purple-700 text-white border hover:bg-white hover:text-gray-700" wire:click="updateReply">
			Save Changes
		</x-forms.default-button>
	  {{-- cancel button --}}
	  <x-forms.default-button class="border-gray-700 border" @click="$refs.editReplyModal.classList.add('hidden')">
			Cancel
		</x-forms.default-button>
	</div>
</x-modal>
