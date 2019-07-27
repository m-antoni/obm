@extends('layouts.app')

@section('content')
		
<div class="container customHeight">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-12 col-sm-12 col-12">
               <div class="clearfix pb-2">
                    <div class="float-left">
                        
                    </div>
                    <div class="float-right">
                        <a href="{{ route('products') }}">
                            <button class="btn btn-outline-primary">
                                <i class="fa fa-shopping-cart"></i> 
                                    SHOP
                            </button>
                        </a>
                    </div>
                </div>    

            <div class="card mb-3" id="myorders">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-8">
                           {{--  <h5 class="mb-3">To:</h5> --}}
                            <div class="text-dark mb-1"><b>{{ auth()->user()->getFullNameAttribute() }}</b> </div>                   
                            <div> </div>
                            <div>Address: {{ auth()->user()->address }}</div>
                            <div>Email: {{ auth()->user()->email}}</div>
                            <div>Phone: {{ auth()->user()->phone }}</div>
                        </div>
                    </div>
                    <div class="table-responsive-sm">
                    	@if(count($orders) > 0)
                        <table class="table table-hover table-sm">
                            <thead class="bg-info text-white">
                                <tr>
                                    <th>Item</th>
                                    <th>Ref No.</th>
                                    <th>Total</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            
                            @foreach($orders as $order)
	                            <tbody>
	                                <tr>
	                                    <td>{{ $order->product->p_name}}</td>
	                                    <td>{{ $order->reference }}</td>
	                                    <td>{{ number_format($order->price) }}</td>
	                                    <td>{{ $order->date->format('m-j-Y') }}</td>
                                        <td class="{{ $order->status == 'pending' ? 'text-secondary' : 'text-success' }}">{{ $order->status }}</td>
	                                </tr>
	                            </tbody>
                            @endforeach
                        </table>
                        {{ $orders->links()}}	
	                 	@else
							<h4>You do not have orders...</h4>
	                 	@endif
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5">
                        </div>
                        <div class="col-lg-4 col-sm-5 ml-auto">
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection