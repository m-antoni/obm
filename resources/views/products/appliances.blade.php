@extends('layouts.app')

@section('content')

<div class="container mb-4" id="products">
			@if(count($appliances) > 0)
				<div class="row justify-content-center">
					<div class="col-md-6">
							@foreach($appliances as $row)
							    <div class="list-group">
							    		<div class="list-group-item mt-2">
							    				<img src="{{$row->image}}" class="img-fluid">
							    				<h4 class="text-dark">{{Str::limit($row->p_name)}}</h4>

							    				<h4 class="text-dark">Php{{number_format($row->price)}} | <s class="text-danger">SRP:₱{{$row->old_price}}</s></h4>

													<div class="clearfix my-3">
															<div class="float-left">
																	<button class="btn btn-outline-primary btn-sm" type="button" data-toggle="collapse" data-target="#collapseDetails" aria-expanded="false" aria-controls="collapseExample">
																    Click for details
																  </button>
															</div>
															<div class="float-right">
																	 <a href="{{route('show.all', $row->category)}}" class="btn btn-outline-dark btn-sm float-right">
																		  <b><i class="fa fa-list"></i> SHOW ALL</b>
																  </a>
															</div>
													</div>

													<div class="collapse" id="collapseDetails">
													  <div class="card card-body">
													    <p>
													    	{{$row->description}}
													    </p>
													  </div>
													</div>						
			
							    				<a href="{{ route('add.cart', $row->id) }}">
		                          <button class="bttn bttn-primary bttn-block bttn-simple mt-2">
		                          <i class="fa fa-shopping-cart"></i> 
		                           	ADD TO CART
		                          </button>
		                      </a>
							    		</div>
							    </div>
								@endforeach
{{-- 								<a href="{{ $appliances->previousPageUrl()}}">prev page</a>
								<a href="{{ $appliances->nextPageUrl()}}">Next page</a> --}}
						</div>
				</div>	
				<div class="row justify-content-center mt-2">
						<div>
								{{ $appliances->links() }}
						</div>
				</div>				
			@endif
</div>

@endsection


