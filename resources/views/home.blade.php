
@extends('layouts.app')

@section('content')

<div class="container customHeight">
  <div class="row justify-content-center mb-4 no-gutters">
    <div class="col-md-12">
        <div class="card my-2">
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="list-group mb-4">
                  <div class="list-group-item">
                    @if(auth()->user()->image == null)
                      <img src="{{ asset('/img/noimage.jpg') }}" alt="img1" class="img-fluid" >
                    @else
                      <div align="center">
                          <img src="{{ asset('/storage/' . auth()->user()->image ) }}" alt="" class="card-img-bottom">
                      </div>
                    @endif
                    
                    <form action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-2">
                          {{-- <input type="file" name="image" class="form-control"> --}}
                          <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="customFileLang" lang="es">
                            <label class="custom-file-label" for="customFileLang">Upload Here</label>
                          </div>

                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <button type="submit" class="bttn bttn-primary bttn-fill bttn-sm py-1 mt-2 btn-block">
                              <i class="fa fa-image"></i> 
                                UPDATE IMAGE
                            </button> 
                        </div>
                    </form>

                    <div class="card">
                        <div class="card-header bg-dark text-white">User Information</div>
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item"><h5><i class="fa fa-user"></i> {{auth()->user()->getFullNameAttribute()}}</h5></li>
                              <li class="list-group-item"><i class="fa fa-phone text-primary"></i> {{auth()->user()->phone}}</li>
                              <li class="list-group-item"><i class="fa fa-envelope text-primary"></i> {{auth()->user()->email}}</li>
                              <li class="list-group-item"><i class="fa fa-map-marker-alt text-primary"></i> {{auth()->user()->getFullAddressAttribute()}}</li>
                            </ul>
                        </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-8">
                <div class="card">
                  <div class="card-header bg-primary text-white">Profile Page</div>
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-8">
                              <div class="col-10">
                                  <div class="card">
                                      <div class="card-header">Referral</div>
                                      <div class="card-body">
                                          <div><b>Referral Code: </b>{{ auth()->user()->referral_key}}</div>
                                          <div class="text-danger"><b>Refer a Friend to get additional 50 Beems</b></div>
                                      </div>
                                  </div>
                              </div>
                              <br>
                              <br>
                          </div>
                          <div class="col-md-4">
                             <div class="card">
                                <div class="card-body bg-dark">
                                    <h5 class="text-warning"><b>Beems</b> <i class="fa fa-coins"></i> {{number_format(auth()->user()->credits)}}</h5> 
                                </div>
                                <div class="list-group">
                                    <a href="{{ route('shop') }}" class="list-group-item list-group-item-action"><i class="fa fa-shopping-cart"></i> SHOP</a>
                                    <a href="{{ route('list.orders') }}" class="list-group-item list-group-item-action"><i class="fa fa-file"></i> ORDERS</a>
                                    <a href="{{ route('show.credits')}}" class="list-group-item list-group-item-action"><i class="fa fa-coins"></i> BEEMS</a>
                                    <a href="#" class="list-group-item list-group-item-action"><i class="fa fa-chess-knight"></i> GAMES</a>
                                    <a href="#" class="list-group-item list-group-item-action"><i class="fa fa-file-alt"></i> E-Books</a>
                                    <a href="#" class="list-group-item list-group-item-action"><i class="fa fa-tv"></i> LIVE STREAM</a>
                                </div>
                            </div>
                          </div>
                      </div>
                  </div>
                </div>

            
              </div>  
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="row no-gutters">
        <div class="col-md-6">
            <img src="{{'/img/shop/electronics.jpg'}}" alt="elec" class="img-fluid">
            <h1 align="center" class="display-4"> <span class="text-danger">LIVE STREAM</span> <span class="text-muted">ALL YOU WANT</span></h1>
        </div>

        <div class="col-md-6">
            <div class="bd-example">
              <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                  <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{ asset('/img/products/home/1.png') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                     {{--  <h5>Live Streaming </h5> --}}
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('/img/products/home/2.png') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                     {{--    <h5>Services</h5>
                        <p>We have services that can ease every day needs.</p> --}}
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('/img/products/home/3.png') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
           {{--            <h5>Book Flights (Coming Soon)</h5>
                      <p>You can now book flights anytime soon</p> --}}
                    </div>
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
        </div>
    </div>


    <div class="imageThumbnail">
        <div class="row no-gutters">
            <div class="col-md-4 col-sm-4 col-12">
                <div class="imghome">
                    <a href="#"><img src="/img/shop/apparel.jpg" alt="apparel" class="image mg-fluid"></a>
                    <div class="middle">
                        <div class="text">SERVICES</div>
                        <h4 class="text-dark"><b>COMING SOON</b></h4>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4 col-12">
                <div class="imghome">
                    <a href="#"><img src="/img/shop/job.jpg" alt="apparel" class="image mg-fluid"></a>
                    <div class="middle">
                        <div class="text">JOB SEARCH</div>
                        <h4 class="text-dark"><b>COMING SOON</b></h4>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4 col-12">
                <div class="imghome">
                    <a href="#"><img src="/img/shop/book.jpg" alt="apparel" class="image mg-fluid"></a>
                    <div class="middle">
                        <div class="text">BOOKING</div>
                        <h4 class="text-dark"><b>COMING SOON</b></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection