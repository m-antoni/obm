@extends('layouts.main')

@section('content')

<div class="splash-container">
    <div class="card">
      	<div class="card-header text-center bg-primary">
            <span class="splash-description"><i class="fa fa-shopping-cart"></i> CHECK OUT</span>
            <h4 class="text-white">Total Amount: ₱{{ number_format($total) }}</h4>
        </div>
        <div class="card-body">
            <label><i class="fa fa-clipboard-list"></i> Billing Details (PAY ON BANK)</label>
            <form action="{{ route('payonbank.store') }}" method="POST" class="mb-3">
	              @csrf

	              @include('partials.form')
            </form>

            <div align="center">
                <a href="#" class="text-primary" data-toggle="modal" data-target="#bankAccounts">
                  <i class="fa fa-credit-card"></i> Deposit To This Account.
                </a>
            </div>
        </div>
        
        <div class="card-footer bg-white p-0">
            <div class="card-footer-item card-footer-item-bordered">
              <a href="{{ route('shopping.cart') }}" class="footer-link"><i class="fa fa-arrow-left"></i> Cancel</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="bankAccounts" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
                <div class="modal-title">Exclusive Bank Account</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
          </div>
          <div class="modal-body contact text-secondary">
            <div align="center"><b>Metrobank</b></div>
            <div align="center"><b>DC Multinational Megacorp Inc.</b></div>
            <div align="center"><b>2657265514410</b></div>
          </div>
      {{--     <div class="modal-footer text-center">
                
          </div> --}}
      </div>
    </div>
</div>

@endsection