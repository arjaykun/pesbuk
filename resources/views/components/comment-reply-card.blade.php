@props(['object', 'text'])
<div class="mb-1">
  <div class="flex items-start mb-1">

    {{-- object user image --}}
    <div class="w-9 mr-1">
      <x-user-image :user="$object->user" size="xs" />
    </div>

    <div class="w-full bg-gray-200 rounded-md py-1 px-2">
      {{-- object card header --}}
      <div class="flex items-center justify-between">
        {{-- object user name and date created --}}
        <div class="text-purple-700 text-sm">
          <span class="text-bold">{{ $object->user->name }} </span>
          <small class="text-gray-500 text-xs">{{ $object->created_at->diffForHumans() }}</small>
        </div>
        {{-- object options container --}}
        <div class="flex">
        	{{ $header_options }}
        </div>
      </div>
      {{-- object text --}}
      <p class="my-1 text-sm">
        <x-limit-text :text="$text" />
      </p>
    </div>
  </div>

  <div class="flex items-center my-0 ml-10">
  	{{ $footer_options }}
  </div>

  {{ $optional ?? '' }}

</div>