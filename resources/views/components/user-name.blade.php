@props(['user' => auth()->user(), 'size' => 'sm'])

@php
	switch ($size) {
		case 'xs':
			$textSize = 'text-xs';
		case 'lg':
			$textSize = 'text-lg';
		default:
			$textSize = 'text-sm';
			break;
	}
@endphp
 

<a href="{{ route('user.profile', ['user' => $user]) }}" class="text-gray-700 font-bold {{ $textSize}} hover:text-gray-500">
	{{ $user->name }} 
</a>