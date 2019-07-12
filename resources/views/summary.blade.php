@extends('layouts.app')

@section('content')

<div class="container">
		<div class="clearfix">
		  <span class="float-left"><h2>Order Summary</h2></span>
		  <span class="float-right"></span>
		</div>
		<hr>
	  <div class="clearfix">
		  <span class="float-md-left float-none">
			 		<p>Order By:{{ $order->user->name }}</p>
			  	<p>Delivery Address:{{ $order->user->address }}</p>	
			  	<p>Phone: {{ $order->user->phone }}</p>
		  </span>

		  <span class="float-md-right float-none">
		  		<p class="">Reference No: <b>{{ $order->reference }}</b></p>
		  		<p class="">Date: {{ $order->date->format('m-j-Y') }}</p>
		  		<p class="">Status: <b>{{ $order->status }}</b></p>
		  </span>
		</div>

		<table class="table table-striped table-hover">
				<tr class="bg-dark text-white">
						<td>Item</td>
						<td>Price</td>
						<td>Quantity</td>
						<td>Total</td>
				</tr>

				<tr>
						<td>{{ $order->product->p_name}}</td>
						<td>{{ $order->product->price}}</td>
						<td>{{ $order->quantity}}</td>
						<td>{{ $order->price}}</td>
				</tr>

				<tr>
						<td></td>
						<td></td>
						<td><b>Subtotal</b></td>
						<td>₱ {{ $order->price}}</td>
				</tr>

				<tr>
						<td></td>
						<td></td>
						<td><b>Shipping</b></td>
						<td>FREE SHIPPING</td>
				</tr>

				<tr>
						<td></td>
						<td></td>
						<td><b>Total</b></td>
						<td>₱ {{ $order->price}}</td>
				</tr>
		</table>
		<hr>
		<div class="card bg-primary text-white mb-5">
				<div class="card-body">
						<p>Note: please do remember your reference number for transaction purposes.</p>
				</div>
		</div>
</div>

@endsection