 @props(['text', 'limit' => 250])
 
 <div x-data="{showAll:false}" {{ $attributes->merge(['class' => 'block py-1 break-words']) }}>
  <p :class="{'hidden':showAll, 'inline-block':!showAll}" class="break-words">
  	{{ Str::limit($text, $limit, '...') }}
  </p>
  <p class="hidden break-words" :class="{'hidden':!showAll, 'inline-block':showAll}">
  	{{ $text }}
  </p>
  
  @if (strlen($text) > $limit)
    <button :class="{'hidden':showAll}" class="text-purple-600 mt-2 focus:outline-none inline-block" @click="showAll=true">
      see all
    </button>
  @endif  
</div>