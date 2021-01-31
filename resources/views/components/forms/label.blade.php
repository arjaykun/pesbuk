@props(['text', 'size'=>'sm'])

<label {{ $attributes->merge(["class" => "text-gray-600 font-bold ". ($size == 'sm' ? 'text-sm' : 'text-xs')]) }} >{{ $text }}</label>