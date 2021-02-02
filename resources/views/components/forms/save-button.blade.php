<div>
	<x-forms.icon-button text="" :bordered="true" class="px-2 text-gray-500" disabled wire:loading wire:target="updateBio, updateBasicInfo, updateEducation, updateWork">
			<img src="{{ asset('loading-dark.svg') }}" alt="loading..." class="w-8" >
	</x-forms.icon-button> 
	<div wire:loading.class="hidden" >
		<x-forms.icon-button text="Save" :bordered="true" {{ $attributes->merge(['class' => 'px-2 py-1 text-gray-500']) }}  >
			<svg class="w-6 mr-2 text" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
			  <path d="M7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V6h5a2 2 0 012 2v7a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2h5v5.586l-1.293-1.293zM9 4a1 1 0 012 0v2H9V4z" />
			</svg>
		</x-forms.icon-button> 
	</div>
</div>