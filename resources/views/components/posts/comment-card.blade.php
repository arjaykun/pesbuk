@props(['comment', 'edit'])

<x-comment-reply-card :object="$comment" :text="$comment->comment">

  <x-slot name="header_options" >
      {{-- edit button --}}
      <x-forms.icon-button class="text-xs text-gray-500 mr-1" wire:click="showEditCommentModal({{ $comment->id }}, '{{ $comment->comment }}')">
        <svg class="w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
          <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
          <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
        </svg>
      </x-forms.icon-button>

      {{-- delete object button --}}
      <x-forms.icon-button class="text-xs text-gray-500" wire:click="deleteComment({{ $comment->id }})">
        <svg class="w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" >
          <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
        </svg>
      </x-forms.icon-button> 
  </x-slot>

  <x-slot name="footer_options" >

    <livewire:comment-likes :comment="$comment" :key="$comment->id" />

    <x-forms.icon-button text="{{ $comment->replies->count() }} Replies" :bordered="false" class="px-2" @click="showReplies=!showReplies">
      <svg class="w-5 mr-1 text-purple-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
        <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />
        <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z" />
      </svg>
    </x-forms.icon-button>

  </x-slot>

  <x-slot name="optional">
    {{-- preview one reply --}}
    @if($comment->replies->count()) 
      <div :class="{'block':!showReplies, 'hidden':showReplies}" class="ml-9 mt-2 text-xs block text-gray-500">
        
        <x-user-image :user="$comment->replies->last()->user" size="xs" />
        <span class="font-bold">{{ $comment->replies->last()->user->name }} </span>

        {{ Str::limit($comment->replies->last()->reply, 15, '...') }}
        <span class="text-gray-500">{{ $comment->replies->last()->created_at->diffForHumans() }}</span>

      </div>
    @endif

    <div class="ml-9 hidden mt-2" :class="{'block':showReplies, 'hidden':!showReplies}">

      @forelse ($comment->replies as $reply)
        <x-posts.reply-card :reply="$reply" />
      @empty
        <div class="text-xs w-full text-center text-gray-600 mb-2 bg-gray-100 rounded-md py-1 px-2">  There's no reply in this comment yet.
        </div>
      @endforelse


      {{-- replies textarea --}}
      <div class="flex items-center mb-2">

        <div class="w-9">
          <x-user-image :user="auth()->user()" size="sm" />
        </div>

        <form wire:submit.prevent="createReply({{ $comment->id }})" class="flex items-center w-full">

          <input type="text" class="w-full bg-gray-300 h-8 rounded-md resize-none mx-2 p-1 focus:outline-none" placeholder="Write a reply..." @if(!$edit) wire:model.lazy="reply" @endif>
          
          <button class="focus:outline-none" type="submit">
            <svg class="w-7 text-purple-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
            </svg>
          </button>

        </form>
      </div>
    </div>
  </x-slot>


</x-comment-reply-card>