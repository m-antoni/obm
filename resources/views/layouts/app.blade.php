<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
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

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
     {{-- Concept theme --}}
    <link rel="stylesheet" href="/assets/vendor/fonts/circular-std/style.css">
    {{-- <link rel="stylesheet" href="/assets/libs/css/style.css"> --}}
    <link rel="stylesheet" href="/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    
    <!-- Custom fonts for this template -->
    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom CSS STYLES -->
     <!-- SideBar -->
    <link rel="stylesheet" href="{{ asset('/css/normalize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/pushy.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/pushycustom.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/normalize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}"> 
    @yield('style')

</head>
  <body id="page-top">

      @include('partials.topnav')  

      <div id="app" class="customHeight">

            <main style="margin-top: 50px !important; margin-bottom: 60px;">
                 @yield('content')
            </main>
            {{-- <div class="site-overlay"></div> --}}
            
           {{-- @include('partials.messengerfb') --}}
      </div>

      @include('partials.bottomnavbar')    

        <script src="{{ asset('/js/app.js') }}"></script>
        <script src="{{ asset('/js/wow.min.js') }}"></script>
        <script src="{{ asset('/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('/js/iziToast.min.js')}}"></script>   
        <script src="{{ asset('/js/pushy.min.js')}}"></script>   
        <!-- Adding Custom scripts  -->
        @yield('script')
        <!-- ===================== -->
  </body>
</html>

