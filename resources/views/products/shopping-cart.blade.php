@extends('layouts.app')

@section('content')
<div class="py-5 mb-3" style="background: #383c4a">
    <h2 align="center" class="text-white"><i class="fa fa-shopping-cart text-white"></i> SHOPPING CART</h2>
</div>

<div class="container pb-5">
		@if(Session::has('cart'))
				<div class="row justify-content-center">
						<div class="col-md-8 col-sm-12 col-12">
								@foreach($products as $product)
									<ul class="list-group">
										<li class="list-group-item mb-1">	
											<div class="row justify-content-center no-gutters">
												<div class="col-md-4 col-6">
													<img src="{{ $product['item']['image']}}" alt="image" class="img-fluid" width="60%">
												</div>
												<div class="col-md-4 col-6">
														<h5>
															<strong>
																{{ Str::limit($product['item']['p_name'], 45)}}
															</strong>	
														</h5>
													<div class="label label-success"><b>
														<h5 class="text-primary">Php {{ number_format($product['price'])}}</b></h5>
													</div>
												</div>
												<div class="col-md-4 col-12">
													<div class="center">
														<div class="qty">
				                        <a href="{{route('delete.cart', $product['item']['id'])}}" class="minus bg-dark">-</a>
				                        <input id="quantity" type="number" class="count" name="qty" min="1" value="{{$product['qty']}}" disabled>
				                        <a href="{{ route('add.cart', $product['item']['id']) }}" class="plus bg-dark">+</a>
				                    </div>
													</div>
												</div>
											</div>											
										</li>
									</ul>
								@endforeach
									@if(!$totalPrice == null)
										<li class="list-group-item mt-2">	
												<div class="py-4 bg-info mb-4">
													<h4 class="text-white" align="center"><b>Total: Php {{ number_format($totalPrice) }}</b></h4>
												</div>
													<h4 align="center">Payment Method </h4>
													<div class="row">
														<div class="col-md-6">
																@if(auth()->user()->credits < $totalPrice)
																		<div class="card">
																				<div class="card-body">
																						<h5><b>Get 10% Discount using Beems</b></h5>
																						<div class="alert alert-danger">Your Beem is not enough to purchase <br>	
																							<div align="right">
																									<a href="{{route('show.credits') }}">
																											<b><i class="fa fa-hand-point-right"></i> Click Here </b>
																									</a>	
																							</div>
																						</div>
																				</div>
																		</div>
																@else
																		<div class="card mb-4">
																				<div class="card-body">
																						<h5><b><i class="fa fa-coins"></i> 10% Discount using Beems</b></h5>
																						<a href="{{ route('checkout') }}" class="btn btn-dark btn-block">
																								PAY USING BEEMS
																						</a>
																				</div>
																		</div>
																
																@endif
														</div>

														<div class="col-md-6">
																<div class="card mb-4">
																		<div class="card-body">
																				<h5><b><i class="fa fa-truck"></i>  CASH ON DELIVERY</b></h5>
																				<a href="{{ route('cod') }}" class="btn btn-dark btn-block">
																						CHECK OUT
																				</a>
																		</div>
																</div>
														</div>
													</div>	
												</div>
											</div>
										</li>
									@else
										<div class="py-2 text-center">
												<h1 align="center"><i class="fa fa-times-circle fa-3x text-danger"></i></h1>
												<h4 align="center">No Items in Shopping Cart!</h4>
												<br>
												<a href="{{route('shop')}}">
														<button class="btn btn-dark btn-md">
																CLICK HERE TO GO SHOPPING
														</button>
												</a>
										</div>
									@endif		
						</div>
				@else
				<div class="py-2 text-center">
						<h1 align="center"><i class="fa fa-times-circle fa-3x text-danger"></i></h1>
						<h4 align="center">No Items in Shopping Cart!</h4>
						<br>
						<a href="{{route('shop')}}">
								<button class="btn btn-outline-dark btn-md">
										CLICK HERE TO GO SHOPPING
								</button>
						</a>
				</div>
			</div>
		@endif
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('.count').prop('disabled', true);
            $(document).on('click','.plus',function(){
                $('.count').val(parseInt($('.count').val()) + 1 );
            });
            $(document).on('click','.minus',function(){
                $('.count').val(parseInt($('.count').val()) - 1 );
                    if ($('.count').val() == 0) {
                        $('.count').val(1);
                    }
                });
        });
        </script>
@endsection
