@extends('layouts.app')


@section('admin-content')


	<div class="container">
		<h2>Product List</h2>
	
		<form action="{{ route('admin.product.import') }}" method="POST" enctype="multipart/form-data">
			@csrf
			<input type="file" name="file" class="form-control">

					<div class="btn-group" role="group" aria-label="Basic example">
          	<button class="btn btn-success rounded-0">
	          		<i class="fa fa-file-excel"></i> 
	          		IMPORT FILE
	          </button>
          	<a href="{{ route('admin.product.export') }}" class="btn btn-danger rounded-0">
          		<i class="fa fa-file-excel"></i> 
          			 EXPORT FILE
          	</a>
        	</div>
     </form>

 @if(count($products) > 0)
		 <table class="table table-hover table-striped">
		  <tr>
			    <th>ID</th>
			    <th>Item</th> 
			    <th>Model</th>
			    <th>Category</th>
			    <th>Description</th>
			    <th>Qty</th>
			    <th>Price</th>
		  </tr>
		 
		  @foreach($products as $product)
			  <tr>
			   		<td>{{$product->id}}</td>
			   		<td>{{$product->p_name}}</td>
			   		<td>{{$product->p_model}}</td>
			   		<td>{{$product->p_category}}</td>
			   		<td>{{$product->description}}</td>
			   		<td>{{$product->quantity}}</td>
			   		<td>{{$product->price}}</td>
			  </tr>
			@endforeach
		</table>
	@else
	<h1>There is no data to show...</h1>
 	@endif

	</div>
@endsection

@section('script')
	@if(session('success'))
		<script type="text/javascript">
				iziToast.success({
					  title: 'Success',
					  message: '{{session('success')}}',
					 	icon: 'ico-success',
					  // iconColor: 'rgb(0, 255, 184)',
					  // theme: 'dark',
					  // progressBarColor: 'rgb(0, 255, 184)',
					  position: 'topCenter',
					  transitionIn: 'fadeInLeft',
					  transitionOut: 'fadeOutUp'
				});
		</script>
	@endif
	
	@if(count($errors) > 0)
			@foreach($errors->all() as $error)
				<script type="text/javascript">
						iziToast.error({
							  title: 'Error',
							  message: '{{$error}}',
							 	icon: 'ico-warning',
							  // iconColor: 'rgb(0, 255, 184)',
							  // theme: 'dark',
							  // progressBarColor: 'rgb(0, 255, 184)',
							  position: 'topCenter',
							  transitionIn: 'fadeInLeft',
							  transitionOut: 'fadeOutUp'
						});
				</script>
			@endforeach
		@endif
@endsection