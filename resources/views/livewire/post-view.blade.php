<div>
   
   <x-posts.card :post="$post" />

   {{-- confirm modal --}}
 <x-modal :show="$confirmModal" hide='wire:click="toggleConfirmModal"'>

    <h2 class="text-xl text-gray-700 font-bold">Confirm Action</h2>

    <p class="text-md text-gray-500">Are you sure you want to delete this post?</p>

    <div class="grid grid-cols-2 gap-2 pt-5">

      {{-- confirm button --}}
      <x-forms.default-button class="bg-purple-700 border-purple-700 text-white border hover:bg-white hover:text-gray-700" wire:click="removePost">Proceed</x-forms.default-button>


      {{-- cancel button --}}
      <x-forms.default-button class="border-gray-700 border" wire:click="toggleConfirmModal">Cancel</x-forms.default-button>

    </div>

 </x-modal>

 {{-- edit modal --}}
 <x-modal :show="$editModal" hide='wire:click="toggleEditModal"' width="lg:w-1/3 w-11/12">

    <h2 class="text-xl text-gray-700 font-bold">Update Post</h2>

    <p class="pb-2">You could now update your post.</p>
   
    <textarea 
      class="w-full h-12 p-2 rounded bg-gray-200 resize-none"
      wire:model.lazy="newPost"
    ></textarea>

    <div class="grid grid-cols-2 gap-2 pt-5">

      {{-- confirm button --}}
      <x-forms.default-button class="bg-purple-700 border-purple-700 text-white border hover:bg-white hover:text-gray-700" wire:click="updatePost">Save Changes</x-forms.default-button>


      {{-- cancel button --}}
      <x-forms.default-button class="border-gray-700 border" wire:click="toggleEditModal">Cancel</x-forms.default-button>

    </div>
 </x-modal>


</div>
