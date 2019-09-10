@extends('layouts.app')

@section('content')
	<div class="container customHeight" id="products">

		<div class="row">
				<div class="col-md-3 col-sm-4 col-6 my-3 float-center">
						<a href="{{ route('shop') }}" class="btn btn-sm btn-danger"><i class="fa fa-arrow-circle-left"></i> Go Back</a>
				</div>	
		</div>

		<div class="row justify-content-center">
			@if(count($show) > 0)
					@foreach($show as $row)
						<div class="col-md-3 col-sm-4 col-6 mb-4">
								<div>
									<a href="{{route('single.product', $row->id)}}">
											<img src="{{$row->image}}" alt="img" class="img-fluid rounded-0" style="width: 400px;">
									</a>
								</div>
								<div class="p-1">
									<div id="productName">{{Str::limit($row->p_name, 21)}}</div>
									<div><b>₱{{number_format($row->price)}}</b>
										<small><s><b>SRP:₱{{$row->old_price}}</b></s></small>
									</div>
									
		              <a href="{{ route('add.cart', $row->id) }}" class="btn btn-sm btn-outline-primary btn-block my-2">
		                  <i class="fa fa-shopping-cart"></i> 
		                   	ADD TO CART
		              </a>
								</div>
						</div>	
					@endforeach
			@endif
		</div>
				<div class="row">
						<div class="col-md-3 col-sm-4 col-6 my-3 float-center">
								{{ $show->links() }}
						</div>	
				</div>
</div>

@endsection