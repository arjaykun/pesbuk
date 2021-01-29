<ul class="py-2 text-sm text-gray-700 font-semibold ">
  <a href="/"><li class="px-2 bg-gray-100 py-1 rounded-md hover:bg-purple-500 my-1 hover:text-white">
    Home
  </li></a>
  <a href="{{ route('user.profile', ['user' => auth()->user()]) }}"><li class="px-2 bg-gray-100 py-1 rounded-md hover:bg-purple-500 my-1 hover:text-white">
    Profile
  </li></a>
  <a href=""><li class="px-2 bg-gray-100 py-1 rounded-md hover:bg-purple-500 my-1 hover:text-white"> 
    Notifications
  </li></a>
  <a href=""><li class="px-2 bg-gray-100 py-1 rounded-md hover:bg-purple-500 my-1 hover:text-white">
    Settings
  </li></a>
</ul>
