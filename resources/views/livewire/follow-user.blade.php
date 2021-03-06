<div>
	<div>
	@if (!$follow)	
		<x-forms.icon-button :text="($icon ? '' : 'Follow')" :bordered="!$icon" class="{{ $icon ? '' : 'p-2 mx-auto'}}" wire:click="follow">	
				<svg class="w-4 mr-2 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
				</svg>
		</x-forms.icon-button>
	@else
		<x-forms.icon-button :text="($icon ? '' : 'Unfollow')" :bordered="!$icon" class="{{ $icon ? '' : 'p-2 mx-auto'}}" wire:click="unfollow">
				<svg class="w-4 mr-2 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7a4 4 0 11-8 0 4 4 0 018 0zM9 14a6 6 0 00-6 6v1h12v-1a6 6 0 00-6-6zM21 12h-6" />
				</svg>
		</x-forms.icon-button>
	@endif
	</div>
</div>

