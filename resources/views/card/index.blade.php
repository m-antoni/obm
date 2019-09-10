@extends('layouts.app')

@section('content')
	<div class="py-5 mb-4" style="background: #383c4a">
	    <h2 align="center" class="text-white">Card Registration</h2>
	    <h4 align="center"><i class="fa fa-credit-card fa-2x text-white"></i></h4>
	</div>

	<div class="container">
			<div class="row justify-content-center">
					<div class="col-md-6">
							@if(count($errors) > 0)
								<div class="alert alert-danger mt-3" role="alert">
										<div class="container">
												<ul>
													@foreach($errors->all() as $error)
												<li>{{ $error}}</li>
													@endforeach
												</ul>
										</div>
								</div>	
							@endif

							@if (Session::has('success'))
                  <div class="alert alert-success mt-3" role="alert">
                      <i class="fa fa-check"></i> <b>Success!</b> {{ Session::get('success') }} 
                      <br> <a href="{{ route('home') }}"> Go Back</a>
                  </div>
              @endif

              @if (Session::has('error'))
                  <div class="alert alert-danger mt-3" role="alert">
                      <i class="fa fa-times"></i> <b>Error!</b> {{ Session::get('error') }} 
                  </div>
              @endif
							
							<div class="card mt-2 mb-3">
									<div class="card-body">
										  <form action="{{route('card.store')}}" method="POST" enctype="multipart/form-data">
													@csrf
													<div class="form-group">
														<label>First ID:</label><br> 
														<input type="file" name="first_id" class="form-control">
													</div>

													<div class="form-group">
														<label>Second ID:</label><br> 
														<input type="file" name="second_id" class="form-control">
													</div>

													<div class="form-group">
														<label>Selfie Image:</label><br> 
															<input type="file" name="selfie" class="form-control">
															<small class="text-danger">2MB Maximum Size</small>
													</div>
													<hr>
													<div class="form-group">
														<button type="submit" class="btn btn-primary btn-block">
															<i class="fa fa-send"></i> Submit Now
														</button>

														<a href="{{ route('home') }}" class="btn btn-danger btn-block mt-2">Go back</a>
													</div>
											</form>
									</div>
							</div>
					</div>	
			</div>
	</div>

@endsection