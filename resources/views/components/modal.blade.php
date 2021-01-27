<div 
	{{ $attributes->merge(['class' => 'fixed inset-0 w-full h-full flex justify-center items-start z-100 hidden']) }}
>
  
  <div class="bg-white md:w-96 w-10/12 h-auto py-5 px-3 rounded-md z-50 mt-20">
    
   	{{ $slot }}

  </div>

  {{-- overlay --}}
  <div class="fixed inset-0 w-full h-full bg-black opacity-80 z-40" @click="$event.target.parentElement.classList.add('hidden')"></div>
</div>
