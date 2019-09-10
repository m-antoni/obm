<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'One Beem') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:700|Roboto:700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/bttn.min.css') }}">
    
     <!-- SideBar -->
    <link rel="stylesheet" href="{{ asset('/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/themify-icons.css') }}">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <style>
        body{
          background-image: url('/img/homepage.jpg');
          background-size: cover;
          /*background-repeat: no-repeat;*/
          width: 100%;
        }
        .container {
          margin-top: 50px;
          margin-bottom: 70px;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-12 text-sm-center text-md-right">
                 <h3 class="mt-md-5 mt-sm-0">
                    <img class="img-fluid py-4 wow bounceInDown" data-wow-duration="2s" src="{{ asset('/img/logo2.png') }}" alt="" >
                 </h3>

                 <div id="info" class="mt-3 mb-5">
                     <h4 class="text-white wow bounceInDown" data-wow-duration="2s">Everything you need in just few clicks.</h4>

                     <a class="btn btn-outline-light btn-lg mt-3 wow zoomIn" data-wow-delay="2s" href="{{ asset('/files/onebeem.apk')}}" download>
                        <i class="ti ti-download"></i> <b>DOWNLOAD</b>
                    </a>
                </div>
            </div>

            <div class="col-md-4 col-12" align="center">
                <img  class="wow bounceInRight" data-wow-duration="3s" src="{{ asset('/img/mobile.png')}}">
            </div>
        </div>
    </div>

    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/js/wow.min.js') }}"></script>

    <script>
      $(document).ready(function(){
        new WOW().init();
      });
    </script>
  </body>
</html>

