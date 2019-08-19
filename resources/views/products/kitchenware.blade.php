@extends('layouts.app')

@section('content')

<div class="container customHeight mb-4" id="products">
			@if(count($kitchenware) > 0)
				<div class="row justify-content-center">
					<div class="col-md-6">
							@foreach($kitchenware as $row)
							    <div class="list-group">
							    		<div class="list-group-item">
							    				<img src="{{$row->image}}" class="img-fluid">
							    				<h4 class="text-dark">{{Str::limit($row->p_name)}}</h4>

							    				<h4 class="text-dark">Php{{number_format($row->price)}} | <s class="text-danger">SRP:₱{{$row->old_price}}</s></h4>

													<div class="btn-group" role="group" aria-label="Basic example">
														<button class="btn btn-link btn-sm" type="button" data-toggle="collapse" data-target="#collapseDetails" aria-expanded="false" aria-controls="collapseExample">
													    Click for details
													  </button>
													  <a href="{{route('show.all', $row->category)}}">
													  		<button type="button" class="btn btn-info text-white">
															  	<i class="fa fa-list"></i> SHOW ALL
															  </button>
													  </a>
													</div>

													<div class="collapse" id="collapseDetails">
													  <div class="card card-body">
													    <p>
													    	{{$row->description}}
													    </p>
													  </div>
													</div>						
			
							    				<a href="{{ route('add.cart', $row->id) }}">
		                          <button class="bttn bttn-pill bttn-primary bttn-block mt-2 p-2">
		                          <i class="fa fa-shopping-cart"></i> 
		                           	ADD TO CART
		                          </button>
		                      </a>
							    		</div>
							    </div>
								@endforeach
						</div>
				</div>	
				<div class="row justify-content-center mt-2">
						<div>
								{{ $kitchenware->links() }}
						</div>
				</div>				
			@endif
</div>

@endsection

