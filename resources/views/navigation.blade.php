<nav class="flex items-center w-screen  justify-between bg-purple-700 py-3 lg:px-20 px-5 relative" x-data="{showSideMenu: false, openProfileOption:false, showNotif: false}">
        
  {{-- right nav --}}
  <div class="text-gray-100 flex items-center">
    <button class="text-gray-200 hover:text-white lg:hidden inline-block focus:outline-none" @click="showSideMenu=true">
      <svg class="w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button> 
    <a class="text-xl font-extrabold lg:inline-block hidden hover:text-white" href="/">Pesbuk.com</a>
  </div>

  {{-- center nav search bar --}}
  <form action="{{ route('search') }}" method="GET" class="md:w-64 w-48 lg:self-end self-center relative">
    <input type="text" name="q" placeholder="Search here..." class="w-full bg-gray-200 rounded-md py-0.5 px-2">
    <button class="absolute right-1 top-0 mt-0.5 text-gray-500 focus:outline-none" type="submit">  
      <svg class="w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
    </button>
  </form>
  {{--  End -> center nav --}}

  {{-- left nav --}}
  <div class="text-gray-200">
    {{-- relative container --}}
    <div class="flex items-center">
      <div class="relative">
        <button class="focus:outline-none text-gray-300 hover:text-white mx-1" @click="showNotif=true">  
         <svg class="w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z" clip-rule="evenodd" />
          </svg>
        </button>  

        @php
          $notifCount = auth()->user()->unreadNotifications()->count();
        @endphp
        @if ($notifCount)
          <div class="absolute w-4 h-4 text-xs rounded-full bg-red-600 text-white top-0 right-0 flex items-center justify-center" style="margin-top: -6px; margin-right: -4px">
            {{ $notifCount >= 10 ? '9+'  : $notifCount }}
          </div>
        @endif

        <div class="hidden" :class="{'hidden':!showNotif, 'block':showNotif}">
          <div 
            class="absolute top-12 w-72 shadow-md bg-white p-2 rounded-md right-0  text-md text-gray-500 z-30" 
            @click.away="showNotif=false"
          >         
            <h1 class="text-lg font-bold pb-1">Notifications</h1>
            <hr />
            @forelse (auth()->user()->unreadNotifications->take(6) as $notification)

              <div class="block text-xs flex border-b border-gray-300 py-2 px-1">
                <div class="w-10">
                  <img src="{{ asset('storage/profiles/'.$notification->data['sender']['image']) }}" alt="PIC" class="w-7 h-7 rounded-full mr-2">
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
              <div class="block text-center py-2 bg-gray-100 rounded-md mt-2">No notifications.</div>
            @endforelse
            <a class="block w-full text-center text-gray-700 text-sm pt-2" href="{{ route('notifications.index') }}">Read all notifications</a>
          </div>
          <div class="fixed inset-0 bg-black z-10 opacity-75"></div>
        </div>
        

      </div>

      <button class="focus:outline-none text-gray-300 hover:text-white mx-1">  
         <svg class="w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />
            <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z" />
         </svg>
      </button>  

      <div class="relative">
        <button class="text-base cursor-pointer hover:text-white font-bold focus:outline-none md:border-l-2 md:border-gray-400 md:pl-4 ml-1" @click="openProfileOption=!openProfileOption">
        <x-user-image :user="auth()->user()" />
          <span class="hidden lg:inline-block ml-1"> {{ auth()->user()->name }}</span>
        </button>
        {{-- profile option modal --}}
        <div 
          class="absolute top-12 w-48 shadow-md bg-white p-2 rounded-md right-0 text-md text-gray-500 z-30 hidden" 
          :class="{'block':openProfileOption, 'hidden':!openProfileOption}" 
          @click.away="openProfileOption=false"        
        >         
            <a href="{{ route('user.profile', ['user' => auth()->user() ]) }}" class="block hover:text-gray-700 focus:outline-none">My Profile</a>
            <a href="{{ route('settings.index') }}" class="block hover:text-gray-700 focus:outline-none">Settings</a>
            {{-- logout button --}}
            <form action="/logout" method="POST">
              @csrf
              <button class="hover:text-gray-700 focus:outline-none" type="submit">Logout</button>
            </form>
        </div>
      </div>
      
    </div>
  </div>

  {{-- side menu --}}

  <div class="fixed top-0 left-0 h-full shadow-md bg-white text-gray-500 overflow-hidden z-10 transition-all sm:duration-300 ease-in w-0 overflow-hidden" :class="{'w-60':showSideMenu, 'w-0':!showSideMenu}"> 

    <div class="flex items-center px-3 ">
      <button class="text-gray-500 hover:text-gray-700 focus:outline-none py-3" @click="showSideMenu=false">
        <svg class="w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>

      <h1 class="text-3xl font-extrabold text-purple-700 py-2">
        Pes<span class="text-purple-500">buk</span><small class="text-purple-300">.com</small>
      </h1>
    </div>

    <hr />
    <div class="px-3">
      <x-menu />
    </div>
  </div>
</nav>

