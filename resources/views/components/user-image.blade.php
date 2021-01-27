 @props(['user'])
 
<a href="#">
 	<img src="{{ asset('storage/profiles/'.$user->profileImage) }}" class="rounded-full w-7 h-7 inline-block" alt="Profile Image">
</a>