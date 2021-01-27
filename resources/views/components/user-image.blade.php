 @props(['user', 'size' => 'md'])

 @php
 	$width = 'w-7 h-7';
 	switch ($size) {
 		case 'xs':
 			$width = 'w-3 h-3';
 		case 'sm':
 			$width = 'w-5 h-5';
 			break;
 		case 'lg':
 			$width = 'w-10 h-10';
 		default:
 				$width = 'w-7 h-7';
 			break;
 	}
 @endphp
 
<a href="#">
 	<img src="{{ asset('storage/profiles/'.$user->profileImage) }}" class="rounded-full {{ $width }} inline-block" alt="Profile Image">
</a>