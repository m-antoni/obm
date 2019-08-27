@extends('layouts.app')

@section('content')
	 <div class="py-5 mb-4" style="background: #eaeaea">
	      <h2 align="center" class="text-info">Upload Receipt</h2>
	  </div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-4 col-10">

				@if(count($errors) > 0)
					<div class="alert alert-danger" role="alert">
							<div class="container">
									<ul>
										@foreach($errors->all() as $error)
									<li>{{ $error}}</li>
										@endforeach
									</ul>
							</div>
					</div>	
				@endif

				<div class="list-group">
					<div class="list-group-item">
						<form action="{{route('post.receipt')}}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
									<label>Transaction Number:</label>
										<input type="text" name="transaction_number" class="form-control" id="transaction_number" value="{{old('transaction_number')}}">
							</div>

							<div class="form-group">
								<label>Upload Receipt:</label><br> 
									<input type="file" name="image" class="form-control"><br>
									<small class="text-secondary">2MB Maximum Size</small>
								</div>
							<hr>
							<div class="form-group">
								<button type="submit" class="bttn bttn-primary bttn-simple bttn-block">
									<i class="fa fa-check"></i> Submit
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection