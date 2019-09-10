<nav class="site-header push shadow p-0 bg-white">
    <div class="float-left pt-3">
        <h5 class="text-dark ml-3">
            {{-- <a href="#" data-toggle="modal" data-target="#mybeems"><i class="ti ti-server"></i></a> --}}
            <i class="ti ti-server"></i> {{ Str::limit(number_format(auth()->user()->credits), 9) }}
        </h5>
    </div>

    {{-- <img src="{{ asset('/img/logofinal.png') }}" alt="logo"  class="img-fluid float-center" style="width: 150px;"> --}}

    <div class="float-right pt-2">
        <a class="nav-link" href="{{ route('shopping.cart') }}">
            <div class="text-dark"> 
                <h5 class="hoverLink">
                    <i class="ti ti-shopping-cart"></i> 
                    <b>{{ Session::has('cart') ? Session::get('cart')->totalQty : '0' }}</b>
                </h5>
            </div>
        </a>
    </div>
</nav>


{{-- LEFT SIDEBAR --}}

<nav class="pushy pushy-left" data-focus="#first-link">
    <div id="sidebg">
        @if(auth()->user()->image == null)
            <img src="{{ asset('/img/logocircle.png') }}" alt="logo" class="img-fluid">
        @else
            <img src="{{ asset('/storage/' . auth()->user()->image) }}" alt="circle" class="img-fluid">
        @endif
        <div id="info">
            {{ Str::limit(auth()->user()->getNameLastAttribute(), 19) }} <br>
            {{ Str::limit(auth()->user()->email, 28) }}    
        </div>
    </div>

    <div class="pushy-content">
        <ul>
            <li class="pushy-link"><a href="{{ route('user') }}"><i class="ti-face-smile"></i> My Account</a></li>
            <li class="pushy-link"><a href="{{ route('show.credits')}}"><i class="ti ti-server"></i> Purchase Beems</a></li>
            <li class="pushy-link"><a href="{{ route('list.orders') }}"><i class="ti ti-clipboard"></i> My Orders</a></li>
            <hr>
            <li class="pushy-link"><a href="{{route('shop')}}"><i class="ti ti-shopping-cart"></i> Shopping</a></li>
             {{--  <li class="pushy-submenu">
                <button id="first-link"><i class="fa fa-shopping-cart"></i> SHOP</button>
                <ul>
                    <li class="pushy-link"><a href="{{ route('shopping.cart') }}"><i class="fa fa-shopping-cart"></i> MY CART</a></li>
                    <li class="pushy-submenu">
                        <button><i class="fa fa-list"></i> Categories</button>
                        <ul>
                            <li class="pushy-link"><a href="{{ route('shop') }}">All List</a></li>
                            <li class="pushy-link"><a href="{{ route('appliances')}}">Appliances</a></li>
                            <li class="pushy-link"><a href="{{ route('kitchenware')}}">Kitchenware</a></li>
                            <li class="pushy-link"><a href="#">Electronics</a></li>
                            <li class="pushy-link"><a href="#">Health & Beauty</a></li>
                            <li class="pushy-link"><a href="#">Gadgets</a></li>
                        </ul>
                    </li>
                </ul>
            </li> --}}
            <li class="pushy-link"><a href="{{route('grocery')}}"><i class="ti ti-bag"></i> Grocery</a></li>
            <li class="pushy-link"><a href="{{route('bills')}}"><i class="ti ti-credit-card"></i> Bills & Payment</a></li>
            <li class="pushy-link"><a href="#"><i class="ti ti-mobile"></i> E-Load</a></li>
 {{--       <li class="pushy-submenu">
                <button>Submenu 2</button>
                <ul>
                    <li class="pushy-link"><a href="#">Item 1</a></li>
                    <li class="pushy-link"><a href="#">Item 2</a></li>
                    <li class="pushy-link"><a href="#">Item 3</a></li>
                </ul>
            </li> --}}
            <li class="pushy-submenu">
                <button><i class="ti ti-eye"></i> Live Stream</button>
                <ul>
                    <li class="pushy-link"><a href="#">CNN</a></li>
                    <li class="pushy-link"><a href="#">Cartoon Network</a></li>
                    <li class="pushy-link"><a href="#">MTV</a></li>
                    <li class="pushy-link"><a href="#">ABS CBN</a></li>
                    <li class="pushy-link"><a href="#">ANC</a></li>
                    <li class="pushy-link"><a href="#">GMA</a></li>
                    <li class="pushy-link"><a href="#">GMA NEWS</a></li>
                    <li class="pushy-link"><a href="#">TV 5</a></li>
                    <li class="pushy-link"><a href="#">HBO</a></li>
                    <li class="pushy-link"><a href="#">ETC</a></li>
                </ul>
            </li>
            <li class="pushy-link"><a href="{{ route('ebooks') }}"><i class="ti ti-book"></i> E-Books</a></li>
            <li class="pushy-link"><a href="{{ route('games') }}"><i class="ti ti-game"></i> Games</a></li>
            <li class="pushy-link"><a href="#"><i class="ti ti-headphone"></i> Music</a></li>
            <li class="pushy-link"><a href="#"><i class="ti ti-briefcase"></i> Job Hunt</a></li>
            <li class="pushy-link"><a href="#"><i class="ti ti-location-pin"></i> Booking</a></li>
            <hr>
            <li class="pushy-link"><a href="{{ route('chats') }}"><i class="ti ti-comments"></i> Customer Service</a></li>
            <li class="pushy-link"><a href="#" data-toggle="modal" data-target="#contact"><i class="ti ti-email"></i> Contact Us</a></li>
            <li class="pushy-link mb-5 pb-5"><a href="#" data-toggle="modal" data-target="#signout">
                <i class="ti-power-off"></i> Sign-out</a>
            </li>
           {{--<li class="pushy-link"><a href="#">
                <i class="fa fa-power-off"></i>
                </a>
            </li> --}}
        </ul>
    </div>
</nav>


<!-- Logout Modal-->
<div class="modal fade" id="signout" tabindex="-1" role="dialog" style="z-index: 999999;">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <div align="center">
                <h5>Are you sure?</h5><br>
                <a onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                   <button class="btn btn-outline-dark bttn-md" href="{{ route('logout') }}">
                      <i class="fas fa-power-off mr-2"></i> Sign-out
                   </button>
                </a>
                <form id="logout-form" action="{{ route('userlogout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>          

        <div class="modal-footer">
            
        </div>
      </div>
    </div>
  </div>


  <!-- Contact Modal-->  
  <div class="modal fade" id="contact" tabindex="-1" role="dialog" style="z-index: 999999;">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          Contact Us
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
           <img src="{{ asset('/img/logo2.png') }}" class="img-fluid" alt="logo">
           <div align="center" class="my-4">
               <h5><b>Landline:</b> (02) 692-3693</h5>
               <h5><b>Email:</b>  order@onebeem.com</h5> 
           </div>
        </div>          
    
        <div class="modal-footer">
            
        </div>
      </div>
    </div>
  </div>