<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Pesbuk</title> 
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<style>
    body { font-family: 'Nunito'; }
</style>  

<link rel="stylesheet" href="{{ asset('css/app.css') }}">
@livewireStyles
</head>

<body class="antialiased bg-purple-100">
  @include('navigation')

  <div class="flex justify-center py-5 w-screen h-auto">
    <div class="lg:flex hidden lg:w-1/3 h-auto justify-end lg:pr-2 h-auto">
      <div class="w-52 bg-white rounded-md px-2 h-auto">
      @if (!isset($sidebar))
        @include('default-sidebar')
      @else
        {{ $sidebar }}
      @endif
      </div>
    </div>

    <div class="md:w-1/2 lg:w-1/3 w-11/12 h-auto">
      {{ $slot }}
    </div>  

    <div class="lg:w-1/3 w-0 h-auto">
      
    </div>
  </div>

  @livewireScripts
  <script src="{{ asset('js/app.js') }}"></script>
  @stack('scripts')
</body>

</html>
