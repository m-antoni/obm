@extends('layouts.main')

@section('content')
    <form method="POST" action="{{ route('store_beem') }}" class="splash-container">
        @csrf

        <div class="card">
            <div class="card-header">
                <h3 class="mb-1"><i class="fa fa-database"></i> Welcome to Beem Bucks</h3>
                <p class="text-dark">Please enter your Card Details.</p>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="card-js">
                        <input class="card-number my-custom-class" name="number">
                    {{--     <input class="name" id="the-card-name-element"> --}}
                        @error('number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input class="expiry-month" name="expiry_month">
                        <input class="expiry-year" name="expiry_year">
                        <input class="cvc" name="cvc">
                    </div>
                </div>    
  
                <div class="form-group pt-2">
                    <button type="submit" class="btn btn-block btn-primary" type="submit"><i class="fa fa-credit-card"></i> Register Card</button>
                </div>
            </div>

            <div class="card-footer bg-white">
                 <div class="accordion p-0" id="accordionCards">
                      <div class="card">
                            <div class="card-header" id="headingOne">
                              <h2 class="mb-0" align="center">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                   My Cards
                                </button>
                              </h2>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionCards">
                              <div class="card-body">
                                <ul>
                                    @if(count($cards) > 0)
                                        @foreach($cards as $card)
                                            <ol>{{$card->number}}</ol>
                                        @endforeach
                                    @else
                                        <p class="text-danger">You Have No Credit Cards Yet.</p>        
                                    @endif
                                </ul>
                              </div>
                            </div>
                      </div>
                </div>

                <p class="text-dark"><a href="{{ route('products') }}" class="text-secondary"> <i class="fa fa-arrow-left"></i> GO BACK</a></p>
            </div>
        </div>
    </form>

 @endsection



   
