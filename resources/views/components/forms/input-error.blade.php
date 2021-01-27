@props(['name'])

@error($name)

	<span class="text-xs text-red-500">{{ $message }}</span>

@enderror