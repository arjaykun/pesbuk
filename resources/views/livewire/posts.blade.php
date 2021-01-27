<div class="bg-white mt-2 rounded p-2" x-data="{showOption:false, showComments:false, comment_id:@entangle('commentId')}">
  {{-- post header --}}
  <div class="flex items-center justify-between">
    
    <h2 class="text-purple-500">
        <x-user-image :user="$post->user" />
        {{ $post->user->name }} <small class="ml-0 text-gray-500 italic text-xs">{{ $post->created_at->diffForHumans() }}</small>
    </h2>

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
          <x-forms.icon-button text="Edit" :bordered='false' class="text-xs" @click="showEditModal({{ $post->id }}, '{{ $post->post }}', '{{ route('posts.update', ['post' => $post]) }}')">
            <svg class="w-3 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
              <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
            </svg>
          </x-forms.icon-button>

          {{-- remove button --}}
          <x-forms.icon-button text="Remove" :bordered='false' class="text-xs" @click="document.getElementById('confirmModal').classList.toggle('hidden');document.querySelector('#delete_post_id').value='{{$post->id}}'">
            <svg class="w-3 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
            </svg>

          </x-forms.icon-button>
        @endcan

          {{-- view post button --}}
          <x-icon-link text="View Post" :bordered='false' class="text-xs" href="{{ route('posts.show', ['post' => $post]) }}">
            <svg class="w-3 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
              <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
            </svg>

          </x-icon-link>
      </div>
    </div>
 

  </div>

  {{-- post text --}}
  <p class="py-2">

    {{ $post->post }}

  </p>

  {{-- post footer --}}

  <div class="mt-1 flex items-center">  
    {{-- like button --}}
    <livewire:post-likes :post="$post" />
    {{-- comment button --}}
    <x-posts.comment-button :post="$post" @click="showComments=true" class="ml-2" /> 
  </div>

  {{-- comments sections --}}
  <div class="mt-2 hidden overflow-hidden" :class="{'block':showComments, 'hidden': !showComments}">
    <hr class="py-2" />

    {{-- comment list --}}
    @forelse($post->comments as $comment)
      <x-posts.comment-card :comment="$comment" />
    @empty
      <div class="text-sm w-full text-center text-gray-700 mb-2">There's no comment in this post yet.</div>
    @endforelse

    {{-- comment textarea --}}
     <div class="flex items-center">
        <div class="w-9">
          <x-user-image :user="auth()->user()" />
        </div>
        
        <textarea class="w-full bg-gray-300 h-8 rounded-md resize-none mx-2 p-1" placeholder="Write a comment..." @if(!$editCommentModal) wire:model.lazy="comment" @endif></textarea>

        <button class="focus:outline-none" wire:click="createComment">
          <svg class="w-7 text-purple-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
          </svg>
        </button>
      </div>

      <div wire:loading wire:target="createComment" class="text-xs text-center w-full text-gray-500">
        Commenting...
      </div>

      {{-- comment edit --}}
      <x-posts.edit-comment-modal :show="$editCommentModal" />
  </div>


  @if (session()->has('success'))     
    <div class="bg-purple-700 text-white p-2 fixed bottom-0 left-0 right-0 w-full text-center">
      <strong>Ok! </strong> {{ session('success') }}
    </div>
  @endif

   {{-- overlay --}}
  <div wire:loading.flex class="fixed inset-0 w-screen h-full bg-black opacity-80 z-40 flex items-center justify-center" >
    <div>
        <img src="{{ asset('loading.svg') }}" alt="Loading..." width="120" height="120">
    </div>
   
  </div>


</div>
