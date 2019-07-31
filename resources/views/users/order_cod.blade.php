@extends('layouts.main')

@section('content')

<div class="splash-container">
    <div class="card ">
      	<div class="card-header text-center">
            <img src="img/logo.png" class="img-fluid" alt="">
            {{-- <a href="#"><h1 class="align-text-bottom">ONE BEEM</h1> --}}
            </a><span class="splash-description">Cash On Delivery</span>
        </div>
        <div class="card-body">
            @if(Session::has('message'))
                <div class="alert alert-success">
                     {{ Session::get('message') }}   
                </div>
            @endif
            <form method="POST" action="{{ route('product.cod', $product->id) }}">
	              @csrf

	              @include('partials.form')
            </form>
        </div>

        <div class="card-footer bg-white p-0">
         		<div class="card-footer-item card-footer-item-bordered">
              <a href="{{ route('home') }}" class="footer-link"><i class="fa fa-arrow-left"></i> GO BACK</a>
            </div>

        </div>
    </div>
</div>


@endsection
