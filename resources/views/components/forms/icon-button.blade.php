@props(['text' => '', 'bordered' => true])

<button 
	{{ 
		$attributes->merge(['class' => "text-xs rounded-md font-semibold flex items-center focus:outline-none text-gray-500". ($bordered ? 'border-purple-200 border hover:bg-purple-700 hover:border-purple-700 hover:text-white' : '')]) 
	}}
>
	{{ $slot }}
	{{ $text }}
</button>
