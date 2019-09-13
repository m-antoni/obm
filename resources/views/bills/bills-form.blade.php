@extends('layouts.app')

@section('content')

	<div class="py-5 mb-4" style="background: #00b0ff">
    	<h2 align="center" class="text-white">Bills Payment</h2>
	</div>

	<div class="container">
		<div class="row justify-content-center">
				<div class="col-md-4">
				<div id="output"></div>

				<div id="loader" class="text-center" style="display: none; margin: 70px;">
				  	<div class="spinner-border" style="width: 4rem; height: 4rem; color: #00b0ff" role="status">
				    	<span class="sr-only">Loading...</span>
				  	</div>
				  	<p class="my-2">Please wait...</p>
				</div>

				<div class="card" id="card">
					<div class="card-header"><b>{{ $purpose }}</b></div>
					<div class="card-body">
						<form id="billsForm" enctype="multipart/form-data">
					      @csrf

					      	<div class="form-group">
						   		<label>Amount:</label>
						    	<input type="text" name="amount" id="amount" class="form-control">
							</div>

							<div class="form-group">
							    <label>Ref Number:</label>
							    <input type="text" name="reference_number" id="reference_number" class="form-control">
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
								<button type="submit" id="submitBills" class="btn btn-dark bttn-block">Submit</button>	
								<a href="{{ route('bills') }}" class="btn btn-secondary bttn-block mt-2">Go back</a>
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

		$('#billsForm').on('submit', function(e){
			e.preventDefault();

			var amount =  $('#amount').val();
			var reference_number =  $('#reference_number').val();
			var image =  $('#image').val();
			var purpose =  $('#purpose').val();

			$.ajax({
				url: '{{route('bills.store')}}',
				type: 'POST',
				data: new FormData(this),
				cache: false,
				contentType: false,
				processData:false,
				dataType: 'json',
				beforeSend: function(){
					$('#card').hide();
					$('#loader').show();
				},
				success:function(data){
					
					var html = '';

					if(data.errors){
						html = '<div class="alert alert-danger">';
						for(var count=0; count < data.errors.length; count++){
							html += data.errors[count] + '<br>';
						}
						html += '</div>';
					}

					if(data.status){
						html = '<div class="alert alert-danger"> ' + data.status + '</div>';
					}

					if(data.success){

						html = '<div class="alert alert-success"><i class="ti ti-check"></i> ' + data.success + '</div>';

						$('#amount').val('');
						$('#reference_number').val('');
						$('#image').val('');
						$('#purpose').val(0);
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