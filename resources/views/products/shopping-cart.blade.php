]@extends('layouts.app')

@section('content')
		<style>
			.qty .count {
			    color: #333;
			    display: inline-block;
			    vertical-align: top;
			    font-size: 25px;
			    font-weight: 700;
			    line-height: 30px;
			    padding: 0 2px;
			    min-width: 35px;
			    text-align: center;
			}
			.qty .plus {
			    cursor: pointer;
			    display: inline-block;
			    vertical-align: top;
			    color: white;
			    width: 25px;
			    height: 25px;
			    font: 25px/1 Arial,sans-serif;
			    text-align: center;
			    border-radius: 50%;
			    }
			.qty .minus {
			    cursor: pointer;
			    display: inline-block;
			    vertical-align: top;
			    color: white;
			    width: 25px;
			    height: 25px;
			    font: 25px/1 Arial,sans-serif;
			    text-align: center;
			    border-radius: 50%;
			    background-clip: padding-box;
			}
		/*	div {
			    text-align: right;
			}*/
		/*	.minus:hover{
			    background-color: #eaeaea !important;
			}
			.plus:hover{
			    background-color: #eaeaea !important;
			}*/
			/*Prevent text selection*/
			span{
			    -webkit-user-select: none;
			    -moz-user-select: none;
			    -ms-user-select: none;
			}
			input{  
			    border: 0;
			    width: 2%;
			}
			input::-webkit-outer-spin-button,
			input::-webkit-inner-spin-button {
			    -webkit-appearance: none;
			    margin: 0;
			}
			input:disabled{
			    background-color:white;
			}
       
			.center{
				width:110px;
				  margin: 10px 0px;
				  float: right;
			}

		</style>
<div class="container customHeight pb-5">
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
								<li class="list-group-item mt-2">	
									<div class="clearfix">
										<div class="float-right">
											<div><h5 class="text-muted"><b>Total: Php {{ number_format($totalPrice) }}</b></h5></div><hr>
											<div><h5 class="text-primary"><b>My Credits: {{ number_format(auth()->user()->credits)}}</b></h5></div>
											
											@if(auth()->user()->credits < $totalPrice)
													<div class="text-danger">your credits is not enough</div>
													<a href="{{route('show.credits') }}">
															<button class="bttn bttn-primary bttn-simple bttn-sm bttn-block">
																	<i class="fa fa-coins"></i> Purchase
															</button>
													</a>	
											@else
													<a href="{{ route('checkout') }}">
														<button class="bttn bttn-primary bttn-simple bttn-sm bttn-block">
																<i class="fa fa-shopping-cart"></i> Checkout
														</button>
													</a>
											@endif
										</div>
									</div>
								</li>			
						</div>
				@else
				<div class="py-2 text-center">
						<h1 align="center"><i class="fa fa-times-circle fa-3x text-danger"></i></h1>
						<h2 align="center">No Items in Shopping Cart!</h2>
						<br>
						<a href="{{route('home')}}">
								<button class="btn btn-info btn-md">
										CLICK HERE TO GO SHOP
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
