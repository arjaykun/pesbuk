<nav class="flex items-center w-screen justify-between bg-purple-700 py-3 lg:px-20 px-5 relative" x-data="{showSideMenu: false, openProfileOption:false}">
        
  {{-- right nav --}}
  <div class="text-gray-100 flex items-center">
    
    <button class="text-gray-200 hover:text-white lg:hidden inline-block focus:outline-none" @click="showSideMenu=true">
      
      <svg class="w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
      </svg>

    </button> 

    <a class="text-xl font-extrabold lg:inline-block hidden hover:text-white" href="/">Pesbuk.com</a>

  </div>


  {{-- left nav --}}
  <div class="text-gray-200">

    {{-- relative container --}}
    <div class="relative">

      <button class="text-base cursor-pointer hover:text-white font-bold focus:outline-none" @click="openProfileOption=!openProfileOption">

        {{ auth()->user()->name }}

      </button>

      {{-- profile option modal --}}
      <div 
        class="absolute top-10 w-60 shadow-md bg-white p-2 rounded-md right-0 text-md text-gray-500 z-30 hidden" 
        :class="{'block':openProfileOption, 'hidden':!openProfileOption}" 
        @click.away="openProfileOption=false"        
      >
          
          <a href="" class="hover:text-gray-700 focus:outline-none">Settings </a
            >
          {{-- logout button --}}
          <form action="/logout" method="POST">
            @csrf
            <button class="hover:text-gray-700 focus:outline-none" type="submit">Logout</button>
          </form>
        

      </div>

    </div>

  </div>

  {{-- side menu --}}

  <div class="fixed top-0 left-0 h-full shadow-md bg-white text-gray-500 overflow-hidden z-10 w-0 transition-all sm:duration-300 ease-in"  :class="{'w-60':showSideMenu, 'w-0':!showSideMenu}">
    
    <div class="flex items-center">

      <button class="text-gray-500 hover:text-gray-700 focus:outline-none px-5 py-3" @click="showSideMenu=false">

        <svg class="w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>

      <h1 class="text-3xl font-extrabold text-purple-700 py-2">
        Pes<span class="text-purple-500">buk</span><small class="text-purple-300">.com</small>
      </h1>


    </div>
    <hr />
    <x-menu />

  </div>


</nav>

