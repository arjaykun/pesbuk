@props(['post', 'isLast' => null])

<div class="bg-white mb-2 rounded p-2" x-data="{showOption:false, showComments:false}" @if($isLast) id="lastPost"  @endif>
  {{-- Post Header --}}
  <div class="flex items-center justify-between">
    {{-- Post Image and Name --}}
    <h2 class="text-purple-500">
        <x-user-image :user="$post->user" />
        <x-user-name :user="$post->user" />
        <small class="ml-0 text-gray-500 text-xs">{{ $post->created_at->diffForHumans() }}</small>
    </h2>
    {{-- End -> Post Image and Name --}}

    <div :class="{'relative':showOption}">
      <button class="focus:outline-none" @click="showOption=true"  @click.away="showOption=false">
        <svg class="w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
        </svg>
      </button> 

      {{-- post options --}}
      <div 
        :class="{'block':showOption, 'hidden':!showOption}"
        class="absolute top-0 right-0 w-36 h-auto p-2 shadow-md bg-white hidden rounded-md" 
      >
        {{-- If post is owned by the auth user show the options if not hide it --}}
        @can('modify-post', $post)
          {{-- edit button --}}
          <x-forms.icon-button text="Edit" :bordered='false' class="text-xs" wire:click="showEditForm({{ $post }})">
            <svg class="w-3 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
              <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
            </svg>
          </x-forms.icon-button>
          {{-- End -> Edit Button --}}
          {{-- remove button --}}
          <x-forms.icon-button text="Remove" :bordered='false' class="text-xs" wire:click="showDeleteConfirm({{ $post }})">
            <svg class="w-3 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
            </svg>
          </x-forms.icon-button>
          {{-- End -> Remove Button --}}
        @endcan
        {{-- End Can Condition --}}
        {{-- view post button --}}
        <x-icon-link text="View Post" :bordered='false' class="text-xs" href="{{ route('posts.show', ['post' => $post]) }}">
          <svg class="w-3 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
          </svg>
        </x-icon-link>
        {{-- End -> View Post Button --}}
      </div>
    </div>
  </div>
  {{-- End -> Post Header --}}

  {{-- post text --}}
  <x-limit-text :text="$post->post" class="text-sm" />


  {{-- End -> Post Text --}}

  {{-- post footer --}}
  <div class="mt-1 flex items-center text-sm">  
    <x-posts.post-like :post="$post" />
    <x-posts.comment-button :post="$post" @click="showComments=!showComments" class="ml-2" /> 
  </div>

  @php
    $lastComment = $post->comments->last();
  @endphp

  @if($lastComment)
    <div class="w-full mt-2 cursor-pointer" :class="{'hidden':showComments, 'block':!showComments}">
      <div class="bg-gray-100 text-xs w-full rounded-md py-1 px-2">
        <div>
          <x-user-image :user="$lastComment->user" size="xs" />
          <x-user-name :user="$lastComment->user" size="xs" />
          <span class="text-gray-500">{{ $lastComment->created_at->diffForHumans() }}</span>
        </div>
        <x-limit-text :text="$lastComment->comment" limit="20" />
      </div>
    </div>
  @endif
    
  <x-comments.container :post="$post" />

</div>
