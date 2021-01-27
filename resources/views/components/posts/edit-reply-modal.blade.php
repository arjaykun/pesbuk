@props(['reply', 'show'])

<div 
  x-ref="editCommentModal"
  class="fixed inset-0 w-full h-full flex justify-center items-start z-100 {{ $show? 'block':'hidden' }}"
> 
  <div class="bg-white md:w-96 w-10/12 h-auto py-5 px-3 rounded-md z-50 mt-20">
    
    <h2 class="text-xl text-gray-700 font-bold">Update Reply</h2>

    <p class="pb-2">Update the text below to update your reply.</p>

    <textarea 
      class="w-full h-12 p-2 rounded bg-gray-200 resize-none"
      wire:model.lazy="reply"
    ></textarea>

    <div class="grid grid-cols-2 gap-2 pt-5">

      {{-- confirm button --}}
      <x-forms.default-button type="submit" class="bg-purple-700 border-purple-700 text-white border hover:bg-white hover:text-gray-700" wire:click="updateReply" wire:loading.attr="disabled">Save Changes</x-forms.default-button>

      {{-- cancel button --}}
      <x-forms.default-button class="border-gray-700 border" @click.prevent="$refs.editCommentModal.classList.add('hidden')">Cancel</x-forms.default-button>

    </div>

  </div>



  {{-- overlay --}}
  <div class="fixed inset-0 w-full h-full bg-black opacity-80 z-40" @click="$event.target.parentElement.classList.add('hidden')"></div>

  
</div>

