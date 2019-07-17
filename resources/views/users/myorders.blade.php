@extends('layouts.app')

@section('content')
		
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="clearfix pb-2">
                <div class="float-left"></div>
                  <div class="float-right">
                    <div class="btn-group" role="group" aria-label="Basic example">
                         <a href="{{ route('products') }}" class="btn btn-primary rounded-0"><i class="fa fa-shopping-cart"></i>  SHOP </a>
                     </div>
                  </div>
            </div>

            <div class="card small">
                <div class="card-header bg-dark text-white">
                     {{-- <a class="pt-2 d-inline-block" href="index.html">Order Summary</a> --}}
                    <h5><b>MY ORDERS</b></h5>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-6">
                           {{--  <h5 class="mb-3">To:</h5> --}}
                            <h3 class="text-dark mb-1"> {{ auth()->user()->name }}</h3>                   
                            <div> </div>
                            <div>Address: {{ auth()->user()->address }}</div>
                            <div>Email: {{ auth()->user()->email}}</div>
                            <div>Phone: {{ auth()->user()->phone }}</div>
                        </div>
                    </div>
                    <div class="table-responsive-md">
                    	@if(count($orders) > 0)
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Ref No.</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Payment</th>
                                </tr>
                            </thead>

                            @foreach($orders as $order)
	                            <tbody>
	                                <tr>
	                                    <td>{{ $order->product->p_name}}</td>
	                                    <td>{{ $order->reference }}</td>
	                                    <td>₱ {{ $order->product->price }}</td>
	                                    <td>{{ $order->quantity}}</td>
	                                    <td>₱ {{ $order->price }}</td>
	                                    <td>{{ $order->date->format('m-j-Y') }}</td>
	                                    <td class="text-secondary">{{ $order->status }}</td>
                                        <td>{{ $order->payment }}</td>
	                                </tr>
	                            </tbody>
                            @endforeach
                        </table>
                        {{ $orders->links()}}	
	                 	@else
							<h1>You do not have orders...</h1>
	                 	@endif
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5">
                        </div>
                        <div class="col-lg-4 col-sm-5 ml-auto">
                          
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <p class="mb-0">DC Group of Companies 2019</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection