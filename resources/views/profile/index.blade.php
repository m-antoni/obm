@extends('layouts.app')

@section('content')
	<div class="py-5 mb-3" style="background: #eaeaea">
		<h2 align="center" class="text-dark"><i class="fa fa-user-circle"></i> CLIENT AREA</h2>
	</div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card my-2">
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<a href="{{ route('list.orders')}}">
									<img src="{{ asset('/img/login.jpg')}}" alt="img1" class="img-fluid">
								</a>

								<h4 align="center" class="lead mt-2">ORDER HISTORY</h4>
							</div>

							<div class="col-md-6">
								<a href="{{ route('user.profile')}}">
									<img src="{{ asset('/img/user.jpg')}}" alt="img1" class="img-fluid">
								</a>

								<h4 align="center" class="lead mt-2">USER PROFILE</h4>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection