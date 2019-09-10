@extends('layouts.app')

@section('content')

<div class="imageThumbnail">

    <div class="row no-gutters">
        <div class="col-md-4 col-sm-4 col-12">
            <div class="imghome">
                <img src="/img/shop/appliances.jpg" alt="apparel" class="image mg-fluid">
                <div class="middle">
                    <div class="text">APPLIANCES</div>
                    <h4 class="text-dark"><b><a href="{{ route('appliances') }}">CLICK HERE</a></b></h4>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-4 col-12">
            <div class="imghome">
                <img src="/img/shop/kitchenware.jpg" alt="apparel" class="image mg-fluid">
                <div class="middle">
                    <div class="text">KITCHENWARE</div>
                     <h4 class="text-dark"><b><a href="{{ route('kitchenware') }}">CLICK HERE</a></b></h4>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-4 col-12">
            <div class="imghome">
                <img src="/img/shop/wines.jpg" alt="wines" class="image mg-fluid">
                <div class="middle">
                    <div class="text">WINES & LIQUORS</div>
                    <h4 class="text-dark"><b><a href="{{ route('wines') }}">CLICK HERE</a></b></h4>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-4 col-12">
            <div class="imghome">
                <img src="/img/shop/electronics.jpg" alt="apparel" class="image mg-fluid">
                <div class="middle">
                    <div class="text">ELECTRONICS</div>
                    <h4 class="text-dark"><b><a href="#">CLICK HERE</a></b></h4>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-4 col-12">
            <div class="imghome">
                <img src="/img/shop/gadgets.jpg" alt="apparel" class="image mg-fluid">
                <div class="middle">
                    <div class="text">GADGETS</div>
                    <h4 class="text-dark"><b><a href="#">CLICK HERE</a></b></h4>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-4 col-12">
            <div class="imghome">
                <img src="/img/shop/apparel.jpg" alt="apparel" class="image mg-fluid">
                <div class="middle">
                    <div class="text">APPAREL</div>
                    <h4 class="text-dark"><b><a href="#">CLICK HERE</a></b></h4>
                </div>
            </div>
        </div>

        {{-- <div class="col-md-4 col-sm-4 col-12">
            <div class="imghome">
                <img src="/img/shop/accesories.jpg" alt="apparel" class="image mg-fluid">
                <div class="middle">
                    <div class="text">ACCESORIES</div>
                    <h4 class="text-dark"><b><a href="#">CLICK HERE</a></b></h4>
                </div>
            </div>
        </div> --}}
    </div>
</div>



<!-- Footer -->
{{-- <section class="bg-black small text-center text-white-50 py-5">
  <div class="container">
    <h6>Copyright &copy; ONE BEEM 2019</h6>
  </div>
</section> --}}

@endsection


@section('script')
    @if(session('success'))
        <script type="text/javascript">
            iziToast.success({
                  title: 'Success',
                  message: '{{session('success')}}',
                    icon: 'ico-success',
                  // iconColor: 'rgb(0, 255, 184)',
                  // theme: 'dark',
                  // progressBarColor: 'rgb(0, 255, 184)',
                  position: 'topCenter',
                  transitionIn: 'fadeInLeft',
                  transitionOut: 'fadeOutUp'
            });
        </script>
    @endif
@endsection