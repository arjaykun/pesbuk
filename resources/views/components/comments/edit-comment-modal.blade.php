@props(['show'])

<x-modal x-ref="editCommentModal" class="{{ $show? 'flex' : 'hidden' }}">
	<h2 class="text-xl text-gray-700 font-bold">Update Comment</h2>
	<p class="pb-2">Change the your old comment below to update it.</p>

	<textarea class="w-full h-12 p-2 rounded bg-gray-200 resize-none" wire:model.defer="editComment"></textarea>

	<div class="grid grid-cols-2 gap-2 pt-5">
	  {{-- confirm button --}}
	  <x-forms.default-button type="submit" class="bg-purple-700 border-purple-700 text-white border hover:bg-white hover:text-gray-700" wire:click="updateComment">
			Save Changes
		</x-forms.default-button>
	  {{-- cancel button --}}
	  <x-forms.default-button class="border-gray-700 border" @click="$refs.editCommentModal.classList.add('hidden')">
			Cancel
		</x-forms.default-button>
	</div>
</x-modal>
