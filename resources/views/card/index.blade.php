@extends('layouts.app')

@section('content')
	<div id="billsHeader" class="py-1 mb-3 container-fluid" style="margin-top: 68px;">
			<h1 align="center" class="display-4"><i class="fa fa-credit-card"></i> Card Registration</h1>
	</div>

	<div class="container">
			<div class="row justify-content-center">
					<div class="col-md-5">
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
							
							<div class="card mt-2">
									<div class="card-header"><h5>Get Your Card <b>FOR FREE!</b></h5></div>
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
														<button type="submit" class="bttn bttn-primary bttn-simple bttn-block">
															<i class="fa fa-send"></i> Submit Now
														</button>
													</div>
											</form>
									</div>
							</div>
					</div>	
			</div>
	</div>

@endsection