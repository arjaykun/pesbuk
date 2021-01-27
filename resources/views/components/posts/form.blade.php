@props(['edit'])

<div class="bg-white rounded-md p-2">

	<form method="POST" action="{{ route('posts.store') }}">
		@csrf

		<div class="text-gray-700 text-md pb-1">
			{{ auth()->user()->name }} 
		</div>

		<textarea 
			name="post" 
			placeholder="What's in your mind?"
			class="w-full h-12 p-2 rounded bg-gray-200 resize-none"
		></textarea>

		<div class="flex items-center justify-between my-2">

			<x-forms.default-button class="border-gray-200 border hover:bg-gray-200">
				Add Photo
			</x-forms.default-button>

			<x-forms.button>
				Post
			</x-forms.button>

		</div>

	</form>

</div>