@extends('layouts.app')

@section('content')
	
<div class="container pb-5" style="margin-top: 100px">
		@if(Session::has('cart'))
				<div class="row justify-content-center">
						<div class="col-md-8 col-sm-12 col-12">
								@foreach($products as $product)
									<ul class="list-group">
										<li class="list-group-item mb-1">	
											<div class="row justify-content-center no-gutters">
												<div class="col-md-4 col-12">
													<img src="{{ $product['item']['image']}}" alt="" class="img-fluid" width="60%">
												</div>
												<div class="col-md-4 col-12">
													<div>
														<h5>
															<strong>
																{{ Str::limit($product['item']['p_name'], 45)}}
															</strong>	
														</h5>
													</div>
													<div class="label label-success"><b><h5 class="text-secondary">Php {{ number_format($product['price'])}}</b></h5>
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
								<li class="list-group-item mt-2 border-dark">	
										<div><h4 class="text-muted" align="center"><b>Total: Php {{ number_format($totalPrice) }}</b></h4></div><hr>	
											<div class="row">
												<div class="col-md-6">
														@if(auth()->user()->credits < $totalPrice)
																<div class="card">
																		<div class="card-body">
																				<h4>10% Discount using Beems</h4>
																				<div class="text-danger">Your credits is not enough 	
																						<a href="{{route('show.credits') }}">
																								purchase here 
																						</a>	
																				</div>
																		</div>
																</div>
														@else
																<div class="card">
																		<div class="card-body">
																				<h4>10% Discount using Beems</h4>
																				<a href="{{ route('checkout') }}">
																					<button class="btn btn-outline-dark btn-block">
																							<i class="fa fa-coins"></i> USE BEEMS
																					</button>
																				</a>
																		</div>
																</div>
														
														@endif
												</div>

												<div class="col-md-6">
														<div class="card">
																<div class="card-body">
																		<h4><i class="fa fa-dolly"></i>  CASH ON DELIVERY</h4>
																		<a href="{{ route('cod') }}">
																			<button class="bttn bttn-fill bttn-primary bttn-sm bttn-block">
																					CHECK OUT
																			</button>
																		</a>
																</div>
														</div>
												</div>
											</div>	
										</div>
									</div>
								</li>			
						</div>
				@else
				<div class="py-2 text-center">
						<h1 align="center"><i class="fa fa-times-circle fa-3x text-danger"></i></h1>
						<h2 align="center">No Items in Shopping Cart!</h2>
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
