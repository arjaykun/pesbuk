<div class="ml-9 hidden" :class="{'block':showReplies, 'hidden':!showReplies}">

	@foreach ($comment->replies as $reply)
		<x-posts.reply-card :reply="$reply" />
	@endforeach


	{{-- replies textarea --}}
	<div class="flex items-center mb-2">

	  <div class="w-9">
	    <x-user-image :user="auth()->user()" />
	  </div>

	  <form wire:submit.prevent="createReply" class="flex items-center w-full">

		  <input type="text" class="w-full bg-gray-300 h-8 rounded-md resize-none mx-2 p-1 focus:outline-none" placeholder="Write a reply..." wire:model.lazy="reply">
		  
		  <button class="focus:outline-none" type="submit">
		    <svg class="w-7 text-purple-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
		      <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
		    </svg>
		  </button>

	  </form>
	</div>
	

</div>

