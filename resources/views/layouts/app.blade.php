<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    @auth('admin')
        {{-- auth guard admin styles --}}
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
        <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/libs/css/style.css">
        <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
        <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
        <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
        <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
        <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    @endauth

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
     <!-- Custom fonts for this template -->
    <link href="/vendor/fontawesome-free/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/iziToast.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/css/grayscale.min.css" rel="stylesheet">

     <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body>
    <div id="app">

      @include('partials.navbar')

      <main class="py-4">
          @yield('content')
      </main>
      
      @auth('admin')
          {{-- admin nav bar --}}        
          @include('admin.partials.admin-navbar')
          
          {{--  admin dashboard left sidebar    --}}              
          @include('admin.partials.left-sidebar') 
        
          <div class="dashboard-wrapper">
              <div class="dashboard-ecommerce">
                  <div class="container-fluid dashboard-content ">
                        
                        {{--  admin content goes here --}}   
                        @yield('admin-content')
                        
                  </div>
              </div>
          </div>
      @endauth  


      <!-- Footer -->
      @auth('web')
        <footer class="bg-black small text-center text-white-50">
          <div class="container">
            <h4>Copyright &copy; One Beem 2019</h4>
          </div>
        </footer>
      @endauth
    </div>
      <!-- Plugin JavaScript -->
      {{-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> --}}
      @auth('admin')
          <!-- slimscroll js -->
          <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
          <!-- main js -->
          <script src="assets/libs/js/main-js.js"></script>
          <!-- chart chartist js -->
          <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
          <!-- sparkline js -->
          <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
          <!-- morris js -->
          <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
          <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
          <!-- chart c3 js -->
          <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
          <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
          <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
          <script src="assets/libs/js/dashboard-ecommerce.js"></script>
      @endauth  

      <!-- Custom scripts for this template -->
      <script src="/js/grayscale.min.js"></script>
      <script src="/js/iziToast.min.js"></script>
      <!-- Adding Custom scripts  -->
      @yield('script')
      <!-- =====================  -->
</body>
</html>
