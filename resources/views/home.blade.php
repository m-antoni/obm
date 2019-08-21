
@extends('layouts.app')

@section('content')

<div class="container customHeight">
    <div class="row justify-content-center mb-4 no-gutters">
        <div lass="col-md-12">
              <video autoplay loop muted width="900" height="" controls>
                    <source src="{{asset('/videos/obm.mp4')}}" type="video/mp4"> VIDEO NOT SUPORTED
             </video>      
        </div>
    </div>
    <div class="row no-gutters">
        <div class="col-md-6">
            <img src="{{'/img/users/electronic.jpg'}}" alt="elec" class="img-fluid">
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
                    <a href="#"><img src="/img/users/apparel.jpg" alt="apparel" class="image mg-fluid"></a>
                    <div class="middle">
                        <div class="text">SERVICES</div>
                        <h4 class="text-dark"><b>COMING SOON</b></h4>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4 col-12">
                <div class="imghome">
                    <a href="#"><img src="/img/users/job.jpg" alt="apparel" class="image mg-fluid"></a>
                    <div class="middle">
                        <div class="text">JOB SEARCH</div>
                        <h4 class="text-dark"><b>COMING SOON</b></h4>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4 col-12">
                <div class="imghome">
                    <a href="#"><img src="/img/users/book.jpg" alt="apparel" class="image mg-fluid"></a>
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