<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
     <!-- Custom fonts for this template -->
    <link href="/vendor/fontawesome-free/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/iziToast.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/css/grayscale.min.css" rel="stylesheet">
</head>
<body>
    <div id="app">
       @include('partials.navbar')

        <main class="py-4">
            @yield('content')
        </main>

      <!-- Footer -->

      <footer class="bg-black small text-center text-white-50">
        <div class="container">
          <h4>Copyright &copy; One Beem 2019</h4>
        </div>
      </footer>

    </div>
      <!-- Bootstrap core JavaScript -->
      {{-- <script src="vendor/jquery/jquery.min.js"></script> --}}
      {{-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> --}}

      <!-- Plugin JavaScript -->
      {{-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> --}}
      
      <!-- Custom scripts for this template -->
      <script src="/js/grayscale.min.js"></script>
      <script src="/js/iziToast.min.js"></script>

      @yield('script')
</body>
</html>
