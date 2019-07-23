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
                        <a class="nav-link" href="{{ route('products') }}"> Products</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('myorders') }}">Orders</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#contact">Contact</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link btn btn--m btn--gray-dark text-white" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                <i class="fa fa-signout"></i> Signout
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
                    <div>Landline: 1234-567</div>
                    <div>Phone: 09876543210</div>
                    <div>Email: onebeem@dcgroup.ph</div>
              </div>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- end navbar users-->
<!-- ============================================================== -->


