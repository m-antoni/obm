<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'One Beem') }}</title>
   
    {{-- <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css"> --}}
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/iziToast.min.css') }}" rel="stylesheet">
 
     <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">

    <link href="/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link href="/assets/libs/css/style.css" rel="stylesheet" >
    <link href="/css/bttn.min.css" rel="stylesheet">
    <link href="/assets/vendor/fonts/fontawesome/css/fontawesome-all.css" rel="stylesheet">
		<link href="{{ asset('/css/card-js.min.css') }}" rel="stylesheet" >		
	
	<!-- Scripts -->
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="/js/card-js.min.js"></script>
	
	<style>
	    html,
        body #app{
            background: url('/img/login.jpg') no-repeat;
            background-size: cover;
            height: 100%;
        }     

	    body #app {
	        display: -ms-flexbox;
	        display: flex;
	        -ms-flex-align: center;
	        align-items: center;
	        padding-top: 40px;
	        padding-bottom: 40px;
	    }
	</style>
</head>
<body>

	<div id="app">

		@yield('content')

	</div>
    
    <script src="{{ asset('js/iziToast.min.js') }}"></script>
	 {{-- @include('partials.messages') --}}
      <!-- Adding Custom scripts  -->
      @yield('script')
</body>
</html>
