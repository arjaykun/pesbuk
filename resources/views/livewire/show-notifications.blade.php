<div class="bg-white p-2 rounded-md w-full text-gray-700">

  <h1 class="font-bold text-xl">Notifications</h1>
  <hr />

  @forelse ($notifications as $notification)

    <div class="block text-sm flex border-b border-gray-300  py-2 px-1">
      <div class="w-14">
        <img src="{{ asset('storage/profiles/'.$notification->data['sender']['image']) }}" alt="PIC" class="w-10 h-10 rounded-full mr-2">
      </div>

      <div class="w-full">
        <a href="{{ route('user.profile', ['user' => $notification->data['sender']['id']]) }}" class="text-gray-800 font-semibold">
          {{ $notification->data['sender']['name'] }}
        </a> 
          
        @if($notification->type == 'App\Notifications\CommentNotification' || $notification->type == 'App\Notifications\ReplyNotification')
          @if ($notification->type == 'App\Notifications\CommentNotification')
            commented in your 
          @else
            replied at your comment in this
          @endif
        
          <a class="text-gray-800" href="{{ route('posts.show', ['post' => $notification->data['post']]) }}">
            post.
          </a>
          <div class="block">
            <svg class="w-4 mr-1 text-purple-500 inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />
              <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z" />
            </svg>
            {{ $notification->created_at->diffForHumans() }}
          </div>
        @elseif($notification->type == 'App\Notifications\LikeNotification')
          liked your 

          @switch($notification->data['type'])
              @case('comment')
                 comment in this 
                 @break
              @case('reply')
                 reply in this
          @endswitch

          <a class="text-gray-800" href="{{ route('posts.show', ['post' => $notification->data['post']]) }}">
            post.
          </a>
          
          <div class="block">
           <svg class="w-4 mr-1 text-purple-500 inline-block"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
            </svg>
            {{ $notification->created_at->diffForHumans() }}
          </div>
        @endif

      </div>
    </div>
  @empty
    No notifications.
  @endforelse

  <div class="mt-2"></div>

  {{ $notifications->links() }}
</div>
