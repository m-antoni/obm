@extends('layouts.app')

@section('content')

<div id="jumbotron" class="jumbotron jumbotron-fluid py-5">
    <div align="center" class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                  <img src="{{ asset('/img/logo2.png') }}" class="img-fluid text-center">
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center text-center px-0">
        <div class="col-md-8 col-10">
           <div class="row homeicons">
                <div class="col-4 pb-4">
                    <a href="{{ route('load') }}">
                        <i class="ti ti-mobile fa-2x"></i>
                        <div><b>E-load</b></div>
                    </a>
                </div>
                <div class="col-4 pb-4">
                    <a href="{{ route('shop') }}">
                      <i class="ti ti-shopping-cart-full fa-2x"></i>
                      <div><b>Shop</b></div>
                    </a>
                </div>
                <div class="col-4 pb-4">
                    <a href="#">
                      <i class="ti ti-bag fa-2x"></i>
                      <div><b>Grocery</b></div>
                    </a>
                </div>
                <div class="col-4 pb-4">
                    <a href="{{ route('bills') }}"><i class="ti ti-credit-card fa-2x"></i>
                    <div><b>Bills</b></div></a>
                </div>
                <div class="col-4 pb-4">
                    <a href="{{ route('ebooks') }}">
                      <i class="ti ti-book fa-2x pb-3"></i>
                      <div><b>E-Books</b></div>
                    </a>
                </div>
                <div class="col-4">
                    <a href="#" data-toggle="modal" data-target="#moreicons">
                      <i class="ti ti-more-alt fa-2x"></i>
                      <div><b>More</b></div>
                    </a>
                </div>
           </div> 
        </div>
    </div>
</div>

<div class="row justify-content-center mt-2 mb-5">
    <div class="col-md-8 col-12">
        <div class="owl-carousel owl-theme ads-carousel">
            <div class="item"><img src="{{ asset('/img/products/homepage/img1.jpg') }}" alt=""></div>
            <div class="item"><img src="{{ asset('/img/products/homepage/img2.jpg') }}" alt=""></div>
            <div class="item"><img src="{{ asset('/img/products/homepage/img3.jpg') }}" alt=""></div>
        </div>
    </div>
</div>

 <!-- More Icons Modal-->  
  <div class="modal fade" id="moreicons" tabindex="-1" role="dialog" style="z-index: 999999;">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
           <div align="center" class="row justify-content-center">
              <div class="col-10">
                  <div class="row homeicons">
                      <div class="col-6 pb-3">
                          <a href="{{ route('games') }}">
                              <i class="ti ti-game fa-2x"></i>
                              <div><b>Games</b></div>
                          </a>
                      </div>
                      <div class="col-6 pb-3">
                          <i class="ti ti-eye fa-2x"></i>
                          <div><b>Live Stream</b></div>
                      </div>
                      <div class="col-6 pb-3">
                          <i class="ti ti-headphone fa-2x"></i>
                          <div><b>Music</b></div>
                      </div>
                      <div class="col-6 pb-3">
                          <i class="ti ti-briefcase fa-2x"></i>
                          <div><b>Job Hunt</b></div>
                      </div>
                      <div class="col-6 pb-3">
                          <i class="ti ti-location-pin fa-2x"></i>
                          <div><b>Booking</b></div>
                      </div>
                  </div>
              </div>
           </div>
        </div>          

        <div class="modal-footer">
            
        </div>
      </div>
    </div>
  </div>


@endsection


@section('script')
<script>
  $(document).ready(function(){
    $('.ads-carousel').owlCarousel({
      items: 1,
      loop: true,
      autoplay: true,
      autoplayTimeout: 2000,
      autoplayHoverPause: true,
      responsiveClass: true,
    });
  });
</script>
@endsection