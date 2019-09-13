@extends('layouts.app')

@section('content')
<div class="py-5" style="background: #00b0ff">
    <h4 align="center" class="text-white">LOAD PURCHASE</h4>
</div>

<div class="container">
	<div class="row justify-content-center mt-2">
		<div class="col-md-6">

			<div id="output"></div>

			<div id="loader" class="text-center" style="display: none; margin: 70px;">
			  	<div class="spinner-border" style="width: 4rem; height: 4rem; color: #00b0ff" role="status">
			    	<span class="sr-only">Loading...</span>
			  	</div>
			  	<p class="my-2">Please wait...</p>
			</div>

			<div class="card mt-2" id="card">
				<div class="card-body">
					<form id="eloadForm">
				      	@csrf

				      	<div class="form-group">
							 <h5 align="center"><b>{{$eload->promo}}</b></h5>
						</div>

						<div class="form-group">
						    <label>Description:</label>
						    <p>{{$eload->description}}</p>
						</div>
						  
						<div class="form-group">
						    <label>Mobile Number:</label>
						    <input type="text" name="phone" id="phone" class="form-control">
						</div>  

						<div class="form-group text-center my-4">
							<div class="card p-2 w-50 m-auto">
								<label class="text-primary"><b>Transaction amount:</b></label>
						    	<h5>{{$eload->amount . '.00'}}</h5>
							</div>
						</div>  	

				      	<div class="form-group">
							<button id="submit" type="submit" class="btn btn-dark bttn-block">Submit</button>	
							<a href="{{ route('load') }}" class="btn btn-secondary bttn-block mt-2">Go back</a>
				      	</div>
				 	</form>	
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('script')

<script type="text/javascript">
$(document).ready(function(){

	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
	    }
	});

	$('#eloadForm').on('submit',function(event){
		event.preventDefault();

		var phone =  $('#phone').val();
		var provider = '{{ $eload->provider }}';	
		var promo = '{{ $eload->promo }}';
		var amount = '{{ $eload->amount }}';

		$.ajax({
			url: '{{ route('load.post') }}',
			type: 'POST',
			data: {
				phone: phone,
				provider: provider,
				promo: promo,
				amount: amount
			},
			dataType: 'json',
			beforeSend:function(){
				$('#card').hide();
				$('#loader').show();
			},
			success: function(data){
				var html = '';

				if(data.errors){
					html = '<div class="alert alert-danger">';
					for(var count = 0; count < data.errors.length; count++){
						html += data.errors[count] + '<br>';
					}

					html += '</div>';
				}

				if(data.status){
					html = '<div class="alert alert-danger"> ' + data.status + '</div>';
				}

				if(data.success){
					html = '<div class="alert alert-success"><i class="ti ti-check"></i> ' + data.success + '</div>';

					$('#phone').val('');
				}

				$('#output').html(html);
				$('#loader').hide();
				$('#card').show();
			}
		});
	});
});


</script>

@endsection