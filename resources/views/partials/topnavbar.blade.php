<!-- ============================================================== -->
<!-- navbar users -->
<!-- ============================================================== -->

 <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top shadow-md p-3 shadow-lg bg-white rounded">
    <div class="container">
        <a class="navbar-brand" href="#">
           <img src="{{ asset('/img/logofinal.png') }}" alt="logo"  class="img-fluid" style="width: 150px;">
            {{-- <b class="text-success">ONE BEEM </b> --}}
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><b>{{ __('Login') }}</b></a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"><b>{{ __('Register') }}</b></a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('shopping.cart') }}">
                        <span class="badge badge-default badge-dark p-2 text-white cartQty">
                            <i class="fa fa-shopping-cart"></i> {{ Session::has('cart') ? Session::get('cart')->totalQty : '0' }}
                        </span> 
                    </a>
                    </li>
                    <li class="nav-item">
                        <a href="#"  class="nav-link" data-toggle="modal" data-target="#contact">
                            <b>Contact</b> 
                        </a>
                    </li>
                     <li class="nav-item">
                        <a href="#"  class="nav-link" data-toggle="modal" data-target="#signout">
                            <b><i class="fa fa-power-off"></i></b> 
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Contact Us</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body text-center">
                    {{-- <img src="/img/logo.jpeg" class="img-fluid mb-3" alt="logo"> --}}
                    <div class="contact">Landline: (02) 692-3693</div>
                    <div class="contact">Email: order@onebeem.com</div>
              </div>
        </div>
    </div>
</div>


<!-- Logout Modal-->
  <div class="modal fade" id="signout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-muted" id="exampleModalLabel"><b>Ready to leave?</b></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <div align="center">
                <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                   <i class="fas fa-power-off mr-2"></i> Sign-out
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>          

        <div class="modal-footer">
            
        </div>
      </div>
    </div>
  </div>


<!-- ============================================================== -->
<!-- end navbar users-->
<!-- ============================================================== -->


