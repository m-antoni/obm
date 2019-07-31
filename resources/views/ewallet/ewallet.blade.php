@extends('layouts.app')

@section('content')

<div class="container customHeight" id="ewallet">
		<div class="row justify-content-center">
				<div class="col-md-8">
						<h2><i class="fa fa-wallet"></i> E-Wallet</h2>
						<div class="card-group">
							  <div class="card">
										<div class="card-header p-0">
												{{-- <img src="{{ asset('/img/ewallet/01.jpg') }}" class="card-img-top img-fluid" alt="..."> --}}
										</div>
								    <div class="card-body">
								      	<h4 class="text-muted"><small>Card Enrolled</small></h4>
									      @if(count($cards) > 0)	
									      <table class="table table-hover table-responsive-md">

							      			@foreach($cards as $card)
								      			<tr>
									      			<td><i class="fa fa-credit-card"></i> {{$card->number}}</td>
									      			<td>
																<form action="{{ route('card.destroy', $card->id) }}" method="POST">
																	@csrf
																	@method('DELETE')
																	<button type="submit" class="btn btn-link btn-sm text-danger"><i class="fa fa-times"></i></button>
																</form>
									      			</td>
								      			</tr>
							      			@endforeach

									      </table>
									      @else
									      	<h4 class="py-4" align="center">No Credit Cards...</h4>
									      @endif
												
												<div align="center">
														<small class="text-muted">
											      	<a href="#" class="btn btn-outline-primary float-center mt-2" data-toggle="modal" data-target="#addcard">
											      			&nbsp;
											      				<b align="center"><i class="fa fa-credit-card"></i> ADD NEW</b>
											      	</a>
										      	</small>
												</div>
								    </div>
								    
							  </div>

							  <div class="card">
								    <div class="card-body" align="center">
								      <h4 class="card-title"></h4>
								      <h1>Beem Credits <i class="fa fa-coins"></i></h1>
								      <h4 class="text-muted"><small>Php 45.00 is 1 BBS</small></h4>
											@if(count($cards) > 0)
													<small class="text-muted">
									      	<a href="#" class="btn btn-outline-primary float-center mt-2" data-toggle="modal" data-target="#purchase">
									      			&nbsp; <i class="fa fa-coins"></i> 
									      				<b align="center">PURCHASE BBS</b>
									      	</a>
									      </small>	
								     	@endif
						  				
						  				@if(count($beem) > 0) 	
											<table class="table table-striped table-responsive-sm mt-2">
													<thead>
															<tr>
																<th>Points</th>
																<th>Status</th>
																<th>Action</th>
															</tr>
													</thead>
													<tbody>
															@foreach($beem as $row)
																	<tr>
																			<td>{{$row->points}}</td>
																			<td>{{$row->status == false ? 'Pending': 'Active'}}</td>
																			<td>
																					@if($row->status == true)
																						<button type="submit" class="btn btn-info btn-sm text-white" data-toggle="modal" data-target="#purchaseUpdate"><i class="fa fa-plus"></i></button>
																					@else
																							<button type="submit" class="btn btn-secondary btn-sm text-white" disabled><i class="fa fa-plus"></i></button>
																					@endif
																			</td>
																	</tr>
															@endforeach
													</tbody>
											</table>
											@else
												<h4>No Points..</h4>
											@endif
								    </div>
							  </div>
						</div>
				</div>
		</div>
</div>


{{-- modal for adding cards --}}
<div class="modal fade" id="addcard" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
          <div class="modal-header p-0">
							 <img src="{{ asset('/img/ewallet/01.jpg') }}" class="card-img-top img-fluid" alt="01">
          </div>
          <div class="modal-body">
            <form action="{{ route('store_beem') }}" method="POST" id="addcardform">
            		<div class="form-group">
            				<div class="card-js">
					              <input class="card-number my-custom-class" name="number" id="number">
					          {{--     <input class="name" id="the-card-name-element"> --}}
					              <input class="expiry-month" name="expiry_month" id="expiry_month">
					              <input class="expiry-year" name="expiry_year" id="expiry_year">
					              <input class="cvc" name="cvc" id="cvc">
					          </div>
            		</div>

								<div class="form-group">
										<input type="submit" class="btn btn-info btn-block p-2 text-white" value="submit">
								</div>
            </form>
          </div>
          <div class="modal-footer">
          		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	            </button>
          </div>
      </div>
    </div>
</div>


{{-- modal for purchasing bbs --}}
<div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
          <div class="modal-header">
							 {{-- <img src="{{ asset('/img/ewallet/02.jpg') }}" class="card-img-top img-fluid" alt="..."> --}}
							  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		              <span aria-hidden="true">&times;</span>
		            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('ewallet.store') }}" method="POST" id="purchaseform">
            		@csrf

            		<div class="form-group">
          					<label class="text-muted"><i class="fa fa-database"></i> BBS Points:</label>
          					<select name="points" class="form-control" id="points">
		            				<option value="100">100 BBS</option>
		            				<option value="200">200 BBS</option>
		            				<option value="500">500 BBS</option>
		            				<option value="1000">1000 BBS</option>
		            				<option value="1500">1000 BBS</option>
		            		</select>
            		</div>

            		<div class="form-group">
          					<label class="text-muted"><i class="fa fa-credit-card"></i> Credit Card</label>
          					@if(count($cards) > 0)
	          					<select name="used_card" class="form-control" id="used_card">
			            				@foreach($cards as $card)
														<option>{{ $card->number }}</option>
			            				@endforeach				
			            		</select>
			            	@else
		            		@endif
            		</div>

								<div class="form-group">
										<input type="submit" class="btn btn-info btn-block p-2 text-white" value="submit">
								</div>
            </form>
          </div>
          <div class="modal-footer">
          </div>
      </div>
    </div>
</div>


{{-- modal for updating bbs --}}
<div class="modal fade" id="purchaseUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
          <div class="modal-header">
							 {{-- <img src="{{ asset('/img/ewallet/02.jpg') }}" class="card-img-top img-fluid" alt="..."> --}}
							  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		              <span aria-hidden="true">&times;</span>
		            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('ewallet.update', auth()->user()->id) }}" method="POST" id="purchaseform">
            		@csrf
								@method('PUT')
								
            		<div class="form-group">
            				<h4>Add To My Points</h4>
            				<small><p>purchase another points</p></small>
          					<label class="text-muted"><i class="fa fa-database"></i> BBS Points:</label>
          					<select name="points" class="form-control" id="points">
		            				<option value="100">100 BBS</option>
		            				<option value="200">200 BBS</option>
		            				<option value="500">500 BBS</option>
		            				<option value="1000">1000 BBS</option>
		            				<option value="1500">1000 BBS</option>
		            		</select>
            		</div>

            		<div class="form-group">
          					<label class="text-muted"><i class="fa fa-credit-card"></i> Credit Card</label>
          					@if(count($cards) > 0)
	          					<select name="used_card" class="form-control" id="used_card">
			            				@foreach($cards as $card)
														<option>{{ $card->number }}</option>
			            				@endforeach				
			            		</select>
			            	@else
		            		@endif
            		</div>

								<div class="form-group">
										<input type="submit" class="btn btn-info btn-block p-2 text-white" value="submit">
								</div>
            </form>
          </div>
          <div class="modal-footer">
          </div>
      </div>
    </div>
</div>



@endsection


@section('script')

<script>
		// adding credit cards
		(function(){
				document.querySelector('#addcardform').addEventListener('submit', function(e){
						e.preventDefault();

						axios.post(this.action, {
					   	'number' : document.querySelector('#number').value,
			    		'expiry_month' : document.querySelector('#expiry_month').value,
			    		'expiry_year' : document.querySelector('#expiry_year').value,
			    		'cvc'	:	document.querySelector('#cvc').value,
					  })
					  .then((response) => {
					    	window.location.href = '{{route('ewallet')}}'
					  })
					  .catch((error) => {
					    	// console.log(error.response);
					    	let errors = error.response.data.errors;
					    	let firstItem = Object.keys(errors)[0]
					    	let firstItemDOM = document.getElementById(firstItem)
					    	let firstErrorMessage = errors[firstItem][0]

					    	// remove all the error message
					    	let errorMessages = document.querySelectorAll('.text-danger')
					    	errorMessages.forEach((element) => element.textContent = '')

					    	// show error message;
					    	firstItemDOM.insertAdjacentHTML('afterend', `<div class="text-danger">${firstErrorMessage}</div>`)
					  });
				})
		})(); 

		// purchasing bbs points
		(function(){
				document.querySelector('#purchaseform').addEventListener('submit', function(e){
						e.preventDefault();

						axios.post(this.action, {
					   	'points' : document.querySelector('#points').value,
			    		'used_card' : document.querySelector('#used_card').value,
					  })
					  .then((response) => {
					    	window.location.href = '{{ route('ewallet') }}'
					  })
					  .catch((error) => {
					    	// console.log(error.response);
					    	let errors = error.response.data.errors;
					    	let firstItem = Object.keys(errors)[0]
					    	let firstItemDOM = document.getElementById(firstItem)
					    	let firstErrorMessage = errors[firstItem][0]

					    	// remove all the error message
					    	let errorMessages = document.querySelectorAll('.text-danger')
					    	errorMessages.forEach((element) => element.textContent = '')

					    	// show error message;
					    	firstItemDOM.insertAdjacentHTML('afterend', `<div class="text-danger">${firstErrorMessage}</div>`)
					  });
				})
		})(); 

</script>


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

@if(session('Info'))
    <script type="text/javascript">
        iziToast.info({
              title: 'Note',
              message: '{{session('Info')}}',
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