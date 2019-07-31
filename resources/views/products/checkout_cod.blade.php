@extends('layouts.main')

@section('content')

<div class="splash-container">
    <div class="card">
      	<div class="card-header text-center bg-primary">
            {{-- <img src="img/logo.png" class="img-fluid" alt=""> --}}
            </a><span class="splash-description"><i class="fa fa-shopping-cart"></i> CHECK OUT</span>
            <h4 class="text-white">Total Amount: ₱{{ number_format($total) }}</h4>
        </div>
        <div class="card-body">
            <label><i class="fa fa-clipboard-list"></i> Billing Details (COD)</label>
            <form action="{{ route('cod.store') }}" method="POST">
	              @csrf

	              @include('partials.form')
            </form>
        </div>

        <div class="card-footer bg-white p-0">
            <div class="card-footer-item card-footer-item-bordered">
              <a href="{{ route('shopping.cart') }}" class="footer-link"><i class="fa fa-arrow-left"></i> Cancel</a>
            </div>
        </div>
    </div>
</div>

@endsection
