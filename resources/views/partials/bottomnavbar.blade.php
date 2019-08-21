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
                    <a class="nav-link" href="#"><i class="fa fa-tv fa-2x text-muted" data-toggle="modal" data-target="#stream"></i></a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{ route('show.credits') }}"><i class="fa fa-coins fa-2x text-muted"></i></a>   
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#"><i class="fa fa-chess-knight fa-2x text-muted"></i></a>   
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{ route('ebooks')}}"><i class="fa fa-file-alt fa-2x text-muted"></i></a>   
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{ route('chats') }}"><i class="fa fa-comments fa-2x text-muted"></i></a>   
                  </li>
            </ul>
        </div>
    </div>
</nav>


<div class="modal fade" id="stream" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Choose your Channels</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                   <div class="row">
                      <div class="col-md-4">
                          <img src="{{ asset('/img/channels/cnn.png') }}" alt="cnn" class="img-fluid">
                      </div>
                      <div class="col-md-4">
                          <img src="{{ asset('/img/channels/abscbn.jpg') }}" alt="abscn" class="img-fluid">
                      </div>
                      <div class="col-md-4">
                          <img src="{{ asset('/img/channels/nba.jpg') }}" alt="nba" class="img-fluid">
                      </div>
                      <div class="col-md-4">
                          <img src="{{ asset('/img/channels/gma.png') }}" alt="gma" class="img-fluid">
                      </div>
                      <div class="col-md-4">
                          <img src="{{ asset('/img/channels/hbo.png') }}" alt="hbo" class="img-fluid">
                      </div>
                      <div class="col-md-4">
                          <img src="{{ asset('/img/channels/netflix.png') }}" alt="netflix" class="img-fluid">
                      </div>
                   </div>
              </div>
        </div>
    </div>
</div>

@endauth