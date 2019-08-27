
<nav class="site-header push">
    <div class="float-left mx-4 menu-btn">
        <i class="fa fa-bars fa-2x"></i>
    </div>

    <img src="{{ asset('/img/logofinal.png') }}" alt="logo"  class="img-fluid float-center" style="width: 130px;">

    <div class="float-right mx-2">
        <a class="nav-link" href="{{ route('shopping.cart') }}">
            <div class="text-white"> 
                <i class="fa fa-shopping-cart"></i> 
                <b>{{ Session::has('cart') ? Session::get('cart')->totalQty : '0' }}</b>
            </div>
        </a>
    </div>
</nav>

<nav class="pushy pushy-left" data-focus="#first-link">
    <div class="pushy-content">
        <ul>
            <li class="pushy-link"> 
                <div class="p-2">
                     <img src="{{ asset('/img/logocircle.png') }}" alt="circle" class="img-fluid">     
                </div>
              
            </li>
            <li class="pushy-link"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Dashboard</a></li>
             <li class="pushy-link"><a href="{{route('chats')}}"><i class="fa fa-comments"></i> CHAT</a></li>
            <li class="pushy-submenu">
                <button id="first-link"><i class="fa fa-shopping-cart"></i> SHOP</button>
                <ul>
                    <li class="pushy-link"><a href="{{ route('shopping.cart') }}"> MY CART</a></li>
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
                    <li class="pushy-link"><a href="{{ route('show.credits')}}"><i class="fa fa-coins"></i> Beems</a></li>
                    <li class="pushy-link"><a href="{{ route('list.orders') }}"><i class="fa fa-list"></i> My Orders</a></li>
                </ul>
            </li>
 {{--            <li class="pushy-submenu">
                <button>Submenu 2</button>
                <ul>
                    <li class="pushy-link"><a href="#">Item 1</a></li>
                    <li class="pushy-link"><a href="#">Item 2</a></li>
                    <li class="pushy-link"><a href="#">Item 3</a></li>
                </ul>
            </li> --}}
            <li class="pushy-submenu">
                <button><i class="fa fa-tv"></i> LIVE STREAM</button>
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
            <li class="pushy-link"><a href="{{route('bills')}}"><i class="fa fa-money"></i> BILLS</a></li>
            <li class="pushy-link"><a href="#"><i class="fa fa-plane"></i> BOOKING</a></li>
            <li class="pushy-link"><a href="#"><i class="fa fa-file"></i> E-BOOKS</a></li>
            <li class="pushy-link"><a href="{{ route('games') }}"><i class="fa fa-dice"></i> GAMES</a></li>
            <li class="pushy-link"><a href="#"><i class="fa fa-briefcase"></i> JOB HUNT</a></li>
            <li class="pushy-link"><a href="#" class="text-danger" data-toggle="modal" data-target="#signout">
                <i class="fa fa-power-off"></i> Sign-out</a>
            </li>
        </ul>
    </div>
</nav>

    <!-- Logout Modal-->
<div class="modal fade" id="signout" tabindex="-1" role="dialog" style="z-index: 999999;">
    <div class="modal-dialog  modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <div align="center">
                 <h5 class="modal-title text-danger mb-4"><b>Ready to leave?</b></h5>
                <a onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                   <button class="btn btn-outline-dark bttn-md" href="{{ route('logout') }}">
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
