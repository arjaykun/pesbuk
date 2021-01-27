<button 

	{{ 

		$attributes->merge(['class' => 'bg-purple-700 hover:bg-purple-500 text-sm p-2 text-gray-100 rounded-md font-extrabold']) 

	}}

>
	
	{{ $slot }}


</button>
