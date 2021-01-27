<x-app>
	<div x-data class="w-full">
		<x-posts.form  />

		@foreach ($posts as $post)
			<livewire:posts :post="$post" :key="$post->id" />
		@endforeach
		
		{{-- edit modal --}}
		 <x-modal id="editModal" x-ref="editModal">

		    <h2 class="text-xl text-gray-700 font-bold">Update Post</h2>

		    <p class="pb-2">You could now update your post.</p>

		    <form id="editForm" method="POST">
		    	@csrf
		    	@method('PUT')

			    <textarea 
			      class="w-full h-12 p-2 rounded bg-gray-200 resize-none"
			      id="post-update-text"
			      name="post"
			    ></textarea>

			    <div class="grid grid-cols-2 gap-2 pt-5">

		      {{-- confirm button --}}
		      <x-forms.default-button type="submit" class="bg-purple-700 border-purple-700 text-white border hover:bg-white hover:text-gray-700">Save Changes</x-forms.default-button>

		      {{-- cancel button --}}
		      <x-forms.default-button class="border-gray-700 border" @click.prevent="$refs.editModal.classList.add('hidden')">Cancel</x-forms.default-button>

		     </form>

		    </div>
		 </x-modal>


		{{-- confirm modal --}}
		 <x-modal id="confirmModal" x-ref="confirmModal">

		    <h2 class="text-xl text-gray-700 font-bold">Confirm Action</h2>

		    <p class="text-md text-gray-500">Are you sure you want to delete this post?</p>

		    <div class="grid grid-cols-2 gap-2 pt-5">

		  		{{-- confirm button --}}
		  		<livewire:post-delete />

		      {{-- cancel button --}}
		      <x-forms.default-button class="border-gray-700 border" @click="$refs.confirmModal.classList.add('hidden')">Cancel</x-forms.default-button>

		    </div>

		 </x-modal>

	   @if (session()->has('success'))     
	    <div class="bg-purple-700 text-white p-2 fixed bottom-0 left-0 right-0 w-full text-center">
	      <strong>Ok! </strong> {{ session('success') }}
	    </div>
	  @endif


		 <script>
		 		function showEditModal(id, text, route) {
		 			document.querySelector('#post-update-text').value = text;
		 			document.querySelector('#editForm').action = route;
		 			document.querySelector('#editModal').classList.toggle('hidden');			
		 		}
		 </script>
	 </div>
</x-app>