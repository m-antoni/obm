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
                   </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-user-circle fa-2x"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#contact">Contact</a>
                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#signout">Sign-out</a>
                        </div>
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
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <div align="center">
                 <h5 class="modal-title text-muted mb-4" id="exampleModalLabel"><b>Ready to leave?</b></h5>
                <a onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                   <button class="bttn bttn-danger bttn-fill" href="{{ route('logout') }}">
                      <i class="fas fa-power-off mr-2"></i> Sign-out
                   </button>
                   
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


