@extends('layouts.app')

@section('content')
	<div class="py-5 mb-3" style="background: #eaeaea">
		<h2 align="center" class="text-dark"><i class="fa fa-user-circle"></i> USER PROFILE</h2>
	</div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="card my-2">
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">
								<div class="list-group mb-4">
									<div class="list-group-item">
										@if(auth()->user()->image == null)
											<img src="{{ asset('/img/noimage.jpg') }}" alt="img1" class="img-fluid">
										@else
											<img src="{{ asset('storage/' . auth()->user()->image ) }}" alt="" class="img-fluid">
										@endif
										
										<form action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data">
											@csrf
					                		<div class="form-group mt-2">
					                			{{-- <input type="file" name="image" class="form-control"> --}}
					                			<div class="custom-file">
												  <input type="file" name="image" class="custom-file-input" id="customFileLang" lang="es">
												  <label class="custom-file-label" for="customFileLang">Upload Here</label>
												</div>

					                			@error('image')
						                            <span class="invalid-feedback" role="alert">
						                                <strong>{{ $message }}</strong>
						                            </span>
					                       		 @enderror

						                        <button type="submit" class="btn btn-outline-dark py-1 mt-2 btn-block">
													<i class="fa fa-image"></i> 
														UPDATE IMAGE
												</button>	
					                		</div>
			                			</form>
									</div>

									<div class="list-group-item userInformation">
										<h4>{{auth()->user()->getFullNameAttribute()}}</h4>
										<div>{{auth()->user()->phone}}</div>
										<div>{{auth()->user()->email}}</div>
										<div>{{auth()->user()->street}}, {{auth()->user()->barangay}}, {{auth()->user()->city}}</div>
										
										<br>
										<div><b>Credits:</b> Php {{number_format(auth()->user()->credits)}}</div>
										<div>Refferal Code:
											<input type="text" value="{{ auth()->user()->referral_key}}" class="form-control bg-dark text-warning">
											<span>
												<a href="#" class="text-danger" data-toggle="modal" data-target="#referralKey">
													What is refferal key?
												</a>
											</span>
										</div>
									</div>
								</div>
								
							</div>

							<div class="col-md-8">
								<div class="list-group">
									<div class="card">
										<div class="card-body">
											@if(count($users) > 0)
												<div><input type="text" class="form-control w-50 mb-2" value="discovery friends here..."> </div>
												<div class="row mb-2">
													@foreach($users as $user)
														<div class="col-md-3">
															@if($user->image == null)
																<img src="{{ asset('/img/noimage.jpg') }}" alt="img1" class="img-fluid">
															@else
																<img src="{{ asset('storage/' . $user->image ) }}" alt="" class="img-fluid">
															@endif
															<div>{{$user->first}} {{$user->last}}</div>
														</div>
													@endforeach
												</div>
												{{$users->links()}}
											@endif
										</div>
									</div>
								</div>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection