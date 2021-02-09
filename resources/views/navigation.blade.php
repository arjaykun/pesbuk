<nav class="flex items-center w-screen  justify-between bg-purple-700 py-3 lg:px-20 px-5 relative" x-data="{showSideMenu: false, openProfileOption:false}">
        
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
  <form action="{{ route('search') }}" method="GET" class="w-64 lg:self-end self-center relative">
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
    <div class="relative flex items-center">
      <button class="focus:outline-none text-gray-300 hover:text-white mx-1">  
       <svg class="w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z" clip-rule="evenodd" />
        </svg>
      </button>  

      <button class="focus:outline-none text-gray-300 hover:text-white mx-1">  
         <svg class="w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />
            <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z" />
         </svg>
      </button>  

      <button class="text-base cursor-pointer hover:text-white font-bold focus:outline-none border-l-2 border-gray-400 pl-4 ml-1" @click="openProfileOption=!openProfileOption">
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

