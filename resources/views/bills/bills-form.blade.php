@extends('layouts.app')

@section('content')

	<div class="py-5 mb-4" style="background: #00b0ff">
    	<h2 align="center" class="text-white">Bills Payment</h2>
	</div>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-4">

				@if(count($errors) > 0)
					<div class="alert alert-danger" role="alert">
						<ul class="container">
							@foreach($errors->all() as $error)
						<li>{{ $error}}</li>
							@endforeach
						</ul>
					</div>	
				@endif
				
				@if (session('error'))
				    <div class="alert alert-danger" role="alert">
				        <div>You do not have enough beems to pay your bills, purchase your beems 
				        			<a href="{{route('show.credits')}}">click here</a>
				        </div>
				    </div>
				@endif
					
				
				<div class="card">
						<div class="card-header"><b>{{ $purpose }}</b></div>
						<div class="card-body">
							  <form action="{{route('bills.store')}}" method="POST" enctype="multipart/form-data">
						      @csrf

						      <div class="form-group">
									    <label>Amount:</label>
									    <input type="text" name="amount" id="amount" class="form-control" value="{{ old('amount')}}">
									</div>

									<div class="form-group">
									    <label>Ref Number:</label>
									    <input type="text" name="reference_number" id="reference_number" class="form-control" value="{{ old('reference_number')}}">
									</div>
									  
									<div class="form-group">
									    <label>Upload Receipt:</label>
									    <input type="file" name="image" id="image" class="form-control">
									</div>  

									<div class="form-group">
									    <label>Payment For:</label>
									    <select name="purpose" id="purpose" class="form-control mb-3">
									        <option value="">Choose here...</option>
									        @foreach($bills as $bill)
									          <option value="{{$bill}}">{{$bill}}</option>
									        @endforeach
									    </select>
									</div>

						      <div class="form-group">
											<button type="submit" class="btn btn-dark bttn-block">Submit</button>	
											<a href="{{ route('bills') }}" class="btn btn-secondary bttn-block mt-2">Go back</a>
						      </div>
						  </form>	

						</div>
				</div>
			</div>
		</div>
	</div>
@endsection