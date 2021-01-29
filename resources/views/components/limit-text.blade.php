 @props(['text'])
 
 <div x-data="{showAll:false}" class="block py-2 text-sm break-words" >
  <p :class="{'hidden':showAll, 'inline-block':!showAll}">{{ Str::limit($text, 250, '...') }}</p>
  <p class="hidden" :class="{'hidden':!showAll, 'inline-block':showAll}">{{ $text }}</p>
  
  @if (strlen($text) > 250)
    <button :class="{'hidden':showAll}" class="text-purple-600 mt-2 focus:outline-none inline-block" @click="showAll=true">
      see all
    </button>
  @endif  
</div>