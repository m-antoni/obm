<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'One Beem') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:700|Roboto:700&display=swap" rel="stylesheet">
    <link href="{{ asset('/css/iziToast.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/bttn.min.css') }}">

    {{-- <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css"> --}}
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
     {{-- Concept theme --}}
    <link rel="stylesheet" href="/assets/vendor/fonts/circular-std/style.css">
    <link rel="stylesheet" href="/assets/libs/css/style.css">
    <link rel="stylesheet" href="/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">

     <!-- Scripts -->
    <script src="{{ asset('/js/app.js') }}"></script>

    <style>
      h4, h2, #productName{
        font-family: 'Roboto', sans-serif;
      }

    </style>
</head>
<body>
    <div id="app">
      
       @include('partials.navbar')
       @yield('content')
             
    </div>

      <!-- Custom scripts for this template -->
      <script src="/js/iziToast.min.js"></script>
      <!-- Adding Custom scripts  -->
      @yield('script')
      <!-- =====================  -->
</body>
</html>
