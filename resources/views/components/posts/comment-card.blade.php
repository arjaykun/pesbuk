@props(['comment'])
<div class="mb-3">
  <div class="flex items-start mb-1">

    {{-- comment user image --}}
    <div class="w-9">
      <x-user-image :user="$comment->user" />
    </div>

    <div class="w-full bg-gray-200 rounded-md py-1 px-2">
      {{-- comment card header --}}
      <div class="flex items-center justify-between">

        {{-- comment user name and date created --}}
        <div class="text-purple-700 text-sm">
          <span class="text-bold">{{ $comment->user->name }} </span>
          <small class="text-gray-500 text-xs">{{ $comment->created_at->diffForHumans() }}</small>
        </div>

        {{-- comment options container --}}
        <div class="flex">

          {{-- edit button --}}
          <x-forms.icon-button class="text-xs text-gray-500 mr-1" wire:click="showEditCommentModal({{ $comment->id }}, '{{ $comment->comment }}')">
            <svg class="w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
              <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
            </svg>
          </x-forms.icon-button>

          {{-- delete comment button --}}
          <x-forms.icon-button class="text-xs text-gray-500">
            <svg class="w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" wire:click="deleteComment({{ $comment->id }})">
              <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
            </svg>
          </x-forms.icon-button> 

        </div>

      </div>

      {{-- comment text --}}
      <p class="my-1">
        {{ $comment->comment }}
      </p>

    </div>
  </div>

  <div>

    <livewire:comment-likes :comment="$comment" />
  </div>
</div>