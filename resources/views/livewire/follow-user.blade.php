<div>

	@if (!$follow)
		
	<button class="p-2" wire:click="follow">Follow</button>
	@else
		
	<button class="p-2" wire:click="unfollow">Unfollow</button>

	@endif
</div>

