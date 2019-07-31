
@extends('layouts.app')

@section('content')

<div id="userHome">
    <div class="row no-gutters">
        <div class="col-md-4 col-sm-6 col-12">
            <div class="imghome">
                <a href="#"><img src="/img/users/accesories.jpg" alt="accesories" class="image mg-fluid"></a>
                <div class="middle">
                    <div class="text">ACCESORIES</div>
                    <h4 class="text-dark"><b>COMING SOON</b></h4>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-sm-6 col-12">
            <div class="imghome">
                <a href="#"><img src="/img/users/apparel.jpg" alt="apparel" class="image mg-fluid"></a>
                <div class="middle">
                    <div class="text">APPAREL</div>
                    <h4 class="text-dark"><b>COMING SOON</b></h4>
                </div>
            </div>
        </div>

         <div class="col-md-4 col-sm-6 col-12">
            <div class="imghome">
                <a href="#"><img src="/img/users/electronic.jpg" alt="electronic" class="image mg-fluid"></a>
                <div class="middle">
                    <div class="text">ELECTRONIC</div>
                    <h4 class="text-dark"><b>COMING SOON</b></h4>
                </div>
            </div>
        </div>


        <div class="col-md-4 col-sm-6 col-12">
            <div class="imghome">
                <a href="{{ route('appliances') }}"><img src="/img/users/appliances.jpg" alt="appliances" class="image mg-fluid"></a>
                <div class="middle">
                    <div class="text">APPLIANCE</a></div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-sm-6 col-12">
            <div class="imghome">
                <a href="#"><img src="/img/users/gadgets.jpg" alt="gadgets" class="image mg-fluid"></a>
                <div class="middle">
                    <div class="text">GADGETS</div>
                    <h4 class="text-dark"><b>COMING SOON</b></h4>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-sm-6 col-12">
            <div class="imghome">
                <a href="{{ route('kitchenware') }}"><img src="/img/users/kitchen.jpg" alt="kitchen" class="image mg-fluid"></a>
                <div class="middle">
                    <div class="text">KITCHENWARE</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<section class="bg-black small text-center text-white-50 py-5">
  <div class="container">
    <h6>Copyright &copy; ONE BEEM 2019</h6>
  </div>
</section>

@endsection


