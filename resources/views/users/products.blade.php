@extends('layouts.app')

@section('content')

<div class="container customHeight" id="products">
		<div class="row justify-content-center">
			@if(count($products) > 0)
					@foreach($products as $row)
						<div class="col-md-3 col-sm-4 col-6 mb-4">
								<div>
										@if($row->image == 'noimage.jpg')
											<img src="{{ asset('/img/noimage.jpg') }}" alt="img" class="img-fluid rounded-0" style="width: 400px;">
										@else
											<img src="{{ $row->image }}" alt="img" class="img-thumbnail rounded-0" style="width: 400px;">
										@endif
								</div>
								<div class="p-1">
									<div id="productName">{{$row->p_name}}</div>
									<div><span id="productPrice">₱{{number_format($row->price)}}</span>
										<small><s><b>₱{{$row->old_price}}</b></s></small>
									</div>
									
		             	<a href="{{ route('single.product', $row->id) }}">
		              		<button class="btn btn-outline-primary btn-block mt-2">
		                  <i class="fa fa-shopping-cart"></i> 
		                   	<small>ORDER NOW</small>
		                  </button>
		              </a>
								</div>
						</div>	
					@endforeach
			@endif
		</div>

		<div class="row">
			<div class="col-md-3 col-sm-4 col-6 mb-4">
					{{ $products->links() }}
			</div>	
		</div>
</div>

@endsection


@section('script')
		<script>
				$(document).ready(function(){
					  $("#search").on("keyup", function() {
					    var value = $(this).val().toLowerCase();
					    $("#ordersTable tr").filter(function() {
					      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
					    });
					  });
				});
		</script>
@endsection

