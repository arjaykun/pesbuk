@props(['reply'])


<x-comment-reply-card :object="$reply" :text="$reply->reply">

  <x-slot name="header_options" >
    @can('modify-reply', $reply)
      {{-- edit button --}}
      <x-forms.icon-button class="text-xs text-gray-500 mr-1" wire:click="showEditReplyForm({{ $reply }})">
        <svg class="w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
          <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
          <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
      </svg>
      </x-forms.icon-button>
      {{-- delete object button --}}
      <x-forms.icon-button class="text-xs text-gray-500" wire:click="deleteReply({{ $reply }})">
        <svg class="w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
        </svg>
      </x-forms.icon-button> 
    @endcan
  </x-slot>

  <x-slot name="footer_options" >

    <x-replies.reply-like :reply="$reply" />

    <x-forms.icon-button text="Reply" :bordered="false" class="px-2" @click="$refs.replyInput.focus()">
      <svg class="w-3 mr-1 text-purple-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
        <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />
        <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z" />
      </svg>
    </x-forms.icon-button>

  </x-slot>



</x-comment-reply-card>