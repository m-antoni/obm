@extends('layouts.app')

@section('content')

<div class="py-5" style="background: #00b0ff">
    <h2 align="center" class="text-white">Bills Payment</h2>
</div>

@if (session('success'))
    <div class="alert alert-success my-2 mx-2" role="alert">
        <div><i class="fa fa-check"></i> {{ session('success')}}</div>
    </div>
@endif

<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-md-8 col-12">
            <div class="row justify-content-center homeicons mt-4 mb-2">
                <div class="col-4 pb-4">
                    <a href="#">
                        <i class="ti-plus fa-2x"></i>
                        <div><b>Enroll</b></div>
                    </a>
                </div>
                <div class="col-4 pb-4">
                    <a href="{{ route('bills.history') }}">
                        <i class="ti-view-list fa-2x"></i>
                        <div><b>History</b></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center mb-5">
    <div class="col-md-8 col-12">
        <div class="owl-carousel owl-theme bills-carousel">
            <div class="item"><a href="{{ route('creditcard.loans') }}">
                <img src="{{ asset('/img/bills/1.jpg') }}" class="img-fluid"></a>
            </div>

            <div class="item"><a href="{{ route('cable') }}">
                <img src="{{ asset('/img/bills/2.jpg') }}" class="img-fluid"></a>
            </div>

            <div class="item"><a href="{{ route('utility') }}">
                <img src="{{ asset('/img/bills/3.jpg') }}" class="img-fluid"></a>
            </div>

            <div class="item"><a href="{{ route('government') }}">
                <img src="{{ asset('/img/bills/4.jpg') }}" class="img-fluid"></a>
            </div>

            <div class="item"><a href="{{ route('insurance') }}">
                <img src="{{ asset('/img/bills/5.jpg') }}" class="img-fluid"></a>
            </div>

            <div class="item"><a href="{{ route('telco') }}">
                <img src="{{ asset('/img/bills/6.jpg') }}" class="img-fluid"></a>
            </div>

            <div class="item"><a href="{{ route('others') }}">
                <img src="{{ asset('/img/bills/7.jpg') }}" class="img-fluid"></a>
            </div>
        </div>
    </div>

    <div class="text-danger"><b>Click on the image to choose.</b></div>
</div>

@endsection

@section('script')
<script>
  $(document).ready(function(){
    $('.bills-carousel').owlCarousel({
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

