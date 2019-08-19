@auth()
<!-- 11 - contained in center example -->
<nav class="navbar navbar-expand-sm navbar-light bg-light bg-white fixed-bottom" data-toggle="affix">
    <div class="mx-auto d-sm-flex d-block flex-sm-nowrap">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center" id="navbarsExample11">
            <ul class="navbar-nav">
                <li class="nav-item">
                 <a class="nav-link" href="{{ route('home') }}" ><i class="fa fa-home fa-2x text-muted"></i></a>   
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('shop') }}">
                        <i class="fa fa-shopping-cart fa-2x text-muted"></i>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-tv fa-2x text-muted"></i></a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#"><i class="fa fa-download fa-2x text-muted"></i></a>   
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{ route('chat') }}"><i class="fa fa-comments fa-2x text-muted"></i></a>   
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{ route('client') }}"><i class="fa fa-user-circle fa-2x text-muted"></i></a>   
                  </li>

            </ul>
        </div>
    </div>
</nav>

@endauth