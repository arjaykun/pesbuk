@props(['comment'])

<div class="mt-2 hidden overflow-hidden ml-9 bg-gray-100 rounded-md p-2" :class="{'block':showReplies, 'hidden': !showReplies}">
  
  
  @forelse($comment->replies as $reply)  
    <x-replies.card :reply="$reply" />
  @empty
    <div class="text-sm w-full text-center text-gray-700 mb-2">There's no reply in here.</div>
  @endforelse
 
  {{-- Reply Textarea --}}
   <div class="flex items-center">
      <div class="w-9">
        <x-user-image :user="auth()->user()"  />
      </div>
      <input type="text" class="w-full bg-gray-300 rounded-md py-1 px-2 text-sm mx-2 focus:outline-none" placeholder="Write a reply..." wire:model.defer="newReply" wire:keydown.enter="createReply({{ $comment }})" x-ref="replyInput" />
      <button class="focus:outline-none" wire:click="createReply({{ $comment }})">
        <svg class="w-7 text-purple-700 transform rotate-90" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
          <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
        </svg>
      </button>
   </div>
   {{-- End -> Reply Textarea --}}
</div>