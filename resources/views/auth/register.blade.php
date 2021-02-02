<x-guest>
	<div class="lg:w-1/3 w-96 h-auto " >
		<h1 class="text-5xl font-extrabold text-purple-700 pb-5">		
			Pes<span class="text-purple-500">buk</span><small class="text-purple-300">.com</small>
		</h1>

		<div class="bg-white py-2 px-3 rounded-md">
			<h1 class="text-2xl font-extrabold text-gray-800 pt-3 pb-1">
				Create Account!
			</h1>

			<p class="pb-3 text-gray-500 text-sm">
				We can't wait for you joining us in a ride full of wonders.
			</p>

	 		<form action="/register" method="POST">
			 	@csrf

			 	<div class="mb-2">
			 		<x-forms.label text="Name" />
			 		<x-forms.input type="text" placeholder="John Doe" name="name" />
			 		<x-forms.input-error name="name" />
			 	</div>

			 	<div class="mb-2">
			 		<x-forms.label text="E-mail" />
			 		<x-forms.input type="email" placeholder="johndoe@gmail.com" name="email" />
			 		<x-forms.input-error name="email" />
			 	</div>

			 	<div class="mb-2">
			 		<x-forms.label text="Password" />
			 		<x-forms.input type="password" placeholder="Your password" name="password"  />
			 		<x-forms.input-error name="password" />
			 	</div>

			 	<div class="mb-2">
			 		<x-forms.label text="Confirm Password" />
			 		<x-forms.input type="password" placeholder="Re-type your password again" name="password_confirmation"  />
			 	</div>

			 	<x-forms.button type="submit" class="w-full text-left mt-2 mb-5">
			 		Create
			 	</x-forms.button>
			 </form>

			 <h5 class="text-gray-700 pb-3">
			 		Already have an account? <a href="/login" class="text-purple-700 font-bold">Login here.</a>
			 </h5>		 
		</div>
	</div>
</x-guest>