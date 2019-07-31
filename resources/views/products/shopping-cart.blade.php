@extends('layouts.app')

@section('content')
		<div class="container customHeight pb-5">
				@if(Session::has('cart'))
						<div class="row justify-content-center">
								<div class="col-md-6 col-sm-12 col-12">
										<ul class="list-group list-group-flush">
												@foreach($products as $product)
														<li class="list-group-item">	
															<div class="clearfix">
																	<div class="float-right">
																				<a href="{{ route('delete.cart', ['id' => $product['item']['id']] )}}">
																						<button class="btn btn-outline-danger btn-sm float-right"><i class="fa fa-times"></i></button>
																				</a>	
																	</div>
																	<div class="float-left">
																			<img src="{{ $product['item']['image']}}" alt="" class="img-fluid" width="20%">
																			<span class="badge badge-info p-2 text-white">{{$product['qty']}}</span>
																			&nbsp;<strong>{{ Str::limit($product['item']['p_name'], 20)}}</strong>	
																			<span class="label label-success">₱{{ number_format($product['price'])}}</span>
																	</div>
															</div>
														</li>
												@endforeach
												<li class="list-group-item">	
															<div class="clearfix">
																	<div class="float-right">
																			<div><b>Total: ₱{{ number_format( $totalPrice)}}</b>	</div><hr>
																			<a href="#" class="btn btn-info text-white" data-toggle="modal" data-target="#confirmModal">
																				<i class="fa fa-shopping-cart"></i> Checkout
																			</a>
																	</div>
															</div>
												</li>
										</ul>
								</div>
								
								{{-- confirmmodal --}}
						    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						        <div class="modal-dialog" role="document">
						          <div class="modal-content">
						              <div class="modal-header">
						              	<div> <b>Payment Method</b></div>
						                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						                  <span aria-hidden="true">&times;</span>
						                </button>
						              </div>
						              <div class="modal-body p-0">
						              	<div align="center">
						              			<div class="row no-gutters">
						              					<div class="col-md-6 col-6">
						              							<div class="imghome">
														                <a href="{{ route('checkout.cod') }}"><img src="{{ asset('/img/modal/cod.jpg') }}" alt="cod" class="image img-fluid"></a>
														                <div class="middle bg-warning p-2">
														                    <h5 class="text-dark"><b>COD</b></h5>
														                </div>
													            	</div>
								              			</div>
								              			<div class="col-md-6 col-6">
										              			<div class="imghome">
														                <a href="{{ route('checkout.payonbank') }}"><img src="{{ asset('/img/modal/payonbank.jpg') }}" alt="cod" class="image img-fluid"></a>
														                <div class="middle bg-info p-2">
														                    <h5 class="text-white"><b>PAY ON BANK</b></h5>
														                </div>
													            	</div>
								              			</div>
						              			</div>
						              			{{-- <div>
						              					<a href="{{ route('checkout.cod') }}" class="mb-3">
																				<button class="btn btn-warning btn-lg"><i class="fa fa-truck"></i> COD</button>
																		</a>	
						              			</div>
						              			
																<div>
																		<a href="{{ route('checkout.payonbank') }}">
																				<button class="btn btn-info btn-lg text-white"><i class="fa fa-credit-card"></i> PAY ON BANK</button>
																		</a>	
																</div> --}}
						              	</div>
						              </div>
						             {{--  <div class="modal-footer">
						                  <p>DC GROUP OF COMPANIES</p>
						              </div> --}}
						          </div>
						        </div>
						    </div>
				@else
								<div class="col-md-6 col-sm-12 col-12">
									<h2 align="center">No Items in Shopping Cart!</h2>
								</div>
						</div>
				@endif
		</div>
@endsection