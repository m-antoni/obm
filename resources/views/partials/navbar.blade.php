<!-- ============================================================== -->
<!-- navbar users -->
<!-- ============================================================== -->

 <nav class="navbar navbar-expand-md navbar-light bg-light shadow-md fixed-top p-3 shadow-lg mb-5 bg-white rounded">
    <div class="container">
        <a class="navbar-brand" href="#">
           <img src="{{ asset('/img/logofinal.png') }}" alt="logo"  class="img-fluid" style="width: 150px;">
            {{-- <b class="text-success">ONE BEEM </b> --}}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            Menu
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto text-center">
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
                        <a class="nav-link" href="{{ route('home') }}"> Home</a>
                    </li>
            
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Shop
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('products') }}">Products</a>
                          <a class="dropdown-item" href="{{ route('myorders') }}">My Orders</a>
                          {{-- <a class="dropdown-item" href="{{ route('create_beem') }}">Beem Bucks</a> --}}
                          {{-- <a class="dropdown-item" href="#">Purchase Points</a> --}}
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#contact">Contact</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link btn btn--s btn--gray py-2" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                <i class="fa fa-signout"></i> signout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
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

<!-- ============================================================== -->
<!-- end navbar users-->
<!-- ============================================================== -->


