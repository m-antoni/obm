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
		                			<input type="file" name="image">

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
										<p>Phone: {{auth()->user()->phone}}</p>
										<p>Email Address: {{auth()->user()->email}}</p>
										<p>Home Address: {{auth()->user()->address}}</p>
										<p>Credits: Php {{auth()->user()->credits}}</p>
										<p>Refferal Key: http://onebeem.com/register/{{ auth()->user()->referral_key}} <br>
											<span>
												<a href="#" class="text-danger" data-toggle="modal" data-target="#referralKey">
													What is refferal key?
												</a>
											</span>
										</p>
									</div>
								</div>
								
							</div>

							<div class="col-md-8">
								<div class="list-group">
										<h4>There are no trasaction history..</h4>
								</div>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	{{-- Referral Modal --}}
    <div class="modal fade" id="referralKey" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
              	<div class="modal-title">What is <b>Referral Key</b> and How This Works?</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <ul class="list-unstyled">
                	<h5><b>Referral Key?</b></h5>

                	<p>
                		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut odit ipsam voluptate eum, voluptates molestias mollitia incidunt excepturi quasi. Maxime magni velit ipsum perspiciatis praesentium consequatur molestias laudantium numquam iusto
                		tias mollitia incidunt excepturi quasi. Maxime magni velit ipsum perspiciatis praesentium consequatur molestias laudantium numquam.
                	</p>

                	<h5><b>How to Used it</b></h5>		

                	<p>
                		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut odit ipsam voluptate eum, voluptates molestias mollitia incidunt excepturi quasi. Maxime magni velit ipsum perspiciatis praesentium consequatur molestias laudantium numquam iusto
                		tias mollitia incidunt excepturi quasi. Maxime magni velit ipsum perspiciatis praesentium consequatur molestias laudantium numquam.
                	</p>
                </ul>
              </div>
          </div>
        </div>
    </div>

@endsection