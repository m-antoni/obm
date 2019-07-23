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
    <link rel="stylesheet" href="{{ asset('/css/btns.min.css') }}">

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
     {{-- Concept theme --}}
    <link rel="stylesheet" href="/assets/vendor/fonts/circular-std/style.css">
    {{-- <link rel="stylesheet" href="/assets/libs/css/style.css"> --}}
    <link rel="stylesheet" href="/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">


    <!-- Custom fonts for this template -->
    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/grayscale.min.css') }}" >

     <!-- Scripts -->
    <script src="{{ asset('/js/app.js') }}"></script>

    <style>
      h4, h2, #productName{
        font-family: 'Roboto', sans-serif;
      }
      #footer{
        margin-bottom: 0px !important;
      }

      main{
        margin-top: 72px;
      }

      .customHeight{
        margin-top: 100px !important;
      }

    </style>
</head>
  <body id="page-top">
      <div id="app">
        
        @include('partials.navbar')
        
        <main>
           @yield('content')
        </main>

      </div>


        <!-- Plugin JavaScript -->
        {{-- <script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script> --}}

        <!-- Custom scripts for this template -->
        <script src="js/grayscale.min.js"></script>

          <!-- Custom scripts for this template -->
        <script src="/js/iziToast.min.js"></script>

        <!-- Adding Custom scripts  -->
        @yield('script')
        <!-- ===================== -->
  </body>
</html>

