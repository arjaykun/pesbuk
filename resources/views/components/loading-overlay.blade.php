  {{-- overlay --}}
  <div wire:loading.flex class="fixed inset-0 w-screen h-full bg-black opacity-80 z-40 flex items-center justify-center" wire:target="createComment, updateComment, showEditCommentModal, deleteComment, createReply, updateReply, deleteReply, showEditReplyModal">
    <div>
        <img src="{{ asset('loading.svg') }}" alt="Loading..." width="120" height="120">
    </div>
   
  </div>