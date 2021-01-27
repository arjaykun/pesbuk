<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>RJ</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
      body {
          font-family: 'Nunito';
      }
  </style>

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  
  </head>

  <body class="antialiased bg-gray-100">
    
    <div class="w-screen h-screen flex items-center justify-center">
   
     {{  $slot }}
   
    </div>
  
  </body>


</html>
