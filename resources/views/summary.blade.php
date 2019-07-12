@extends('layouts.app')

@section('content')

<div class="container">
		<div class="clearfix">
		  <span class="float-left"><h2>Order Summary</h2></span>
		  <span class="float-right">
		  	<a class="btn btn-outline-primary rounded-0" href="{{ route('edit.summary', $order->id) }}">
		  			edit</a>
		  </span>
		</div>

		<hr>

	  <div class="clearfix">
		  <span class="float-md-left float-none">
			 		<p>Order By:{{ $order->user->name }}</p>
			  	<p>Delivery Address:{{ $order->user->address }}</p>	
		  </span>

		  <span class="float-md-right float-none">
		  		<p>Reference No: <b>{{ $order->reference }}</b></p>
		  		<p class="float-md-right">Date: {{ $order->date->format('m-j-Y') }}</p>	
		  </span>
		  
		</div>

		<table class="table table-striped">
				<tr class="bg-secondary text-white">
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
		<div class="clearfix">
		  <span class="float-left"></span>
		  <span class="float-right"><button class="btn btn-lg btn-primary rounded-0">PLACE YOUR ORDER</button></span>
		</div>
</div>

@endsection