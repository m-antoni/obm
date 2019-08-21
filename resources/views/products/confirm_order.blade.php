@extends('layouts.app')

@section('content')
	<div class="py-5 mb-3" style="background: #eaeaea">
			<h2 align="center" class="text-muted">ORDER CONFIRMATION</h2>
	</div>
	<div class="container mb-4">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card my-2">
					<div class="card-body">
						<h4 align="center">
							<span class="text-info">Order No:</span> {{$order->order_number}}
						</h4>
						<br>
						<h5 align="center" class="text-muted">We Sent to your email your invoice</h5 align="center">

									@if($order->payment == 'BEEMS')
										<h5 align="center" class="text-muted">Remaining Beems
											<i class="fa fa-coins"></i> {{number_format(auth()->user()->credits)}}
										</h5>
									@else
										{{-- nothing	 --}}
									@endif
					</div>
				</div>

				<div class="mt-3" align="center">
						<h5 class="text-muted"><b>Give us 24 hrs to process your order</b></h5>
						<a href="{{route('list.orders')}}" class="btn btn-sm btn-outline-dark">
							ORDER HISTORY
						</a>
				</div>
				
				<div class="mt-3">
						If you have any questions about your order, contact us on
					 	(02) 692-3693 <span class="text-info">order@onebeem.com</span>
				</div>
			</div>
		</div>
	</div>

@endsection
