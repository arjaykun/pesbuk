@props(['post'])

<div class="mt-2 hidden overflow-hidden" :class="{'block':showComments, 'hidden': !showComments}">
  <hr class="py-2" />
  
  @forelse($post->comments as $comment)  
    {{-- wrap every comment-card with an x-data for their own to show/hide their respective replies --}}
     <div x-data="{showReplies:false}">
        <x-comments.card :comment="$comment" />
     </div>
  @empty
    <div class="text-sm w-full text-center text-gray-700 mb-2">There's no comment in this post yet.</div>
  @endforelse
 
  {{-- Comment Textarea --}}
   <div class="flex items-center">
      <div class="w-9">
        <x-user-image :user="auth()->user()" />
      </div>
      <textarea class="w-full bg-gray-300 h-8 rounded-md resize-none mx-2 p-1 focus:outline-none" placeholder="Write a comment..." wire:model.defer="newComment"></textarea>
      <button class="focus:outline-none" wire:click="createComment({{ $post }})">
        <svg class="w-7 text-purple-700 transform rotate-90" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
          <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
        </svg>
      </button>
   </div>
   {{-- End -> Comment Textarea --}}
</div>