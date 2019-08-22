<!DOCTYPE html>
<html>

<!-- Mirrored from expert-themes.com/html/applaap/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Aug 2019 10:42:13 GMT -->
<head>
<meta charset="utf-8">
<title>AppLaap - App Landing HTML Template | Homepage Two</title>
{{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Stylesheets -->
<link href="{{ asset('/assets/landing/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{ asset('/assets/landing/css/style.css')}}" rel="stylesheet">
<link href="{{ asset('/assets/landing/css/responsive.css')}}" rel="stylesheet">

<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
<link rel="icon" href="images/favicon.png" type="image/x-icon">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>
<body>

<div class="page-wrapper">
    <!-- Preloader -->
    <div class="preloader"></div>

    <!--Banner Section-->
    <section class="banner-section alternate" id="features" style="background-image:url(/assets/landing/images/background/3.png)">
      <div class="auto-container">
          <div class="row clearfix">
              <!--Content Column-->
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                  <div class="inner-column">
                  <h2>ONE BEEM</h2>
                      <div class="text">Everything you need in just a few clicks.</div>
                      <div class="btns-box">
                        <a class="theme-btn btn-style-two" href="#">
                          <span class="txt">Download App</span>
                        </a>
                        <a class="theme-btn btn-style-three" href="{{ route('login') }}">
                          <span class="txt">Login Here</span>
                        </a>
                      </div>
                    </div>
                </div>
                <!--Image Column-->
              <div class="image-column col-lg-6 col-md-12 col-sm-12">
                  <div class="image">
                        <img src="{{ asset('/assets/landing/images/resource/mobile-2.png') }}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Banner Section-->

</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-double-up"></span></div>

<script src="{{ asset('/assets/landing/js/jquery.js')}}"></script>
<script src="{{ asset('/assets/landing/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('/assets/landing/js/jquery.fancybox.js')}}"></script>
<script src="{{ asset('/assets/landing/js/jquery.scrollTo.js')}}"></script>
<script src="{{ asset('/assets/landing/js/pagenav.js')}}"></script>
<script src="{{ asset('/assets/landing/js/owl.js')}}"></script>
<script src="{{ asset('/assets/landing/js/wow.js')}}"></script>
<script src="{{ asset('/assets/landing/js/appear.js')}}"></script>
<script src="{{ asset('/assets/landing/js/validate.js')}}"></script>
<script src="{{ asset('/assets/landing/js/script.js')}}"></script>
</body>

<!-- Mirrored from expert-themes.com/html/applaap/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Aug 2019 10:42:14 GMT -->
</html>
