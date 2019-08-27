@extends('layouts.app')

@section('content')
	<div id="billsHeader" class="py-1 mb-3 container-fluid" style="margin-top: 68px;">
			<h1 align="center" class="display-4">Insurance</h1>
	</div>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-4 col-10">

				@if(count($errors) > 0)
					<div class="alert alert-danger" role="alert">
						<ul>
							@foreach($errors->all() as $error)
						<li>{{ $error}}</li>
							@endforeach
						</ul>
					</div>	
				@endif
				
				@if (session('error'))
				    <div class="alert alert-danger" role="alert">
				        <div>You do not have enough credits to pay your bills, purchase your beems 
				        			<a href="{{route('show.credits')}}">click here</a>
				        </div>
				    </div>
				@endif
					
				<div class="card">
					<div class="card-header bg-primary text-white">Payment Form</div>
					<div class="card-body">
						  <form id="billCreditsForm" action="{{route('bills.store')}}" method="POST">
					      @csrf
					      <div class="form-group">
					      		<label>Amount:</label>
					      		<input type="text" name="amount" id="amount" class="form-control">
					      </div>
					      
					      <div class="form-group">
					      	 	<label>Credits:</label>
					         	<select name="bills" id="bills" class="form-control mb-3">
						         		<option value="">Choose here...</option>
						         		@foreach($insurance as $row)
						         			<option value="{{$row}}">{{$row}}</option>
						         		@endforeach
					         	</select>
					      </div>

					      <div class="form-group">
										<button type="submit" class="bttn bttn-fill bttn-primary bttn-sm bttn-block">Submit</button>				      	
					      </div>
					  </form>	
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection