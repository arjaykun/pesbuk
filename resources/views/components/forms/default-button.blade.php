<button 

	{{ 

		$attributes->merge([ 'class' => 'text-sm p-2 rounded-md font-semibold focus:outline-none' ]) 

	}}

>
	
	{{ $slot }}


</button>
