<x-guest>

	<div class="lg:w-1/3 sm:w-96 w-11/12 h-auto " >

		<h1 class="text-5xl font-extrabold text-purple-700 pb-5">
			
			Pes<span class="text-purple-500">buk</span><small class="text-purple-300">.com</small>

		</h1>

		<div class="bg-white py-2 px-3 rounded-md">
	 	
			<h1 class="text-2xl font-extrabold text-gray-800 pt-3 pb-1">
				
				Welcome!

			</h1>
			
			<p class="pb-3 text-gray-500 text-sm">

				Proceed to the land of wonders.

			</p>

			@if ($errors->any())
		    <div>
		        <div class="font-medium text-red-600">{{ __('Whoops! Something went wrong.') }}</div>

		        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
			@endif


			@if (session('status'))
          <div class="mb-4 font-medium text-sm text-green-600">
              {{ session('status') }}
          </div>
      @endif


	 		<form action="/login" method="POST">
			 	
			 	@csrf
	
			 	<div>
			 		<x-forms.label text="E-mail" />
			 		<x-forms.input type="email" placeholder="Your e-mail" name="email" value="{{ old('email') }}" />
			 	</div>

			 	<div>
			 		<x-forms.label text="Password" />
			 		<x-forms.input type="password" placeholder="Your password" name="password"  />
			 	</div>


			 	<x-forms.button type="submit" class="w-full text-left mt-2 mb-5">
			 		Login
			 	</x-forms.button>

			 </form>

			 <h5 class="text-gray-700 pb-3">

			 		Don't have an account? <a href="/register" class="text-purple-700 font-bold">Register here.</a>

			 </h5>
			 
		</div>

	</div>

</x-guest>