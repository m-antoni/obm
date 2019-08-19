@extends('layouts.app')

@section('content')

<div class="container customHeight mb-5">
		<div class="row justify-content-center">
				<div class="col-md-6">
						<h4 align="center">Beem Credits</h4>
						<h4>Step 1</h4>
						<p class="text-muted">First Purchase Beem Credits</p>
						<div class="list-group">
						    <div class="list-group-item py-5 bg-dark" align="center">
						      <h2 class="display-3"><i class="fa fa-coins text-warning"></i></h2>
						      	<div class="card my-3 w-50">
						      			<div class="card-body">
						      					<h4 class="text-muted">{{$credits}}</h4>
						      				  <div class="text-muted">Current Beem Credits</div>
						      			</div>
						      	</div>
										
										<div class="card my-3 w-50">
						      			<div class="card-body">
						      					<h4 class="text-muted">{{$credits}}</h4>
						      				  <div class="text-muted">Pending Purchase</div>
						      			</div>
						      	</div>

										<div class="text-muted">
								      	<a href="#" data-toggle="modal" data-target="#purchase">
														<button class="bttn bttn-primary bttn-fill" >
																<i class="fa fa-coins"></i> 
								      					<b align="center">Purchase Here</b>
														</button>
								      	</a>
							      </div>	
						    </div>
						 </div>

						<h4 class="mt-4">Step 2</h4>
						<p class="text-muted">Bank Transfer your Payment</p>
						<div class="list-group">
						    <div class="list-group-item py-2 bg-dark" align="center">
						      <h1 class="display-3 text-warning"><i class="fa fa-university"></i></h1>
						   		<h1 class="text-white">2657265514410</h1>
						   		<h4 class="text-muted">Metrobank</h4>
						    </div>
						 </div>

						<h4 class="mt-4">Step 3</h4>
						<p class="text-muted">Upload your Transaction Receipt</p>
						<div class="list-group">
						    <div class="list-group-item py-4 bg-dark" align="center">
						    	<h2 class="display-3"><i class="fa fa-image text-warning"></i></h2>
						      <h4 class="text-white">Upload Your Receipt</h4>
										<div class="text-muted">
								      	<a href="#" data-toggle="modal" data-target="#uploadReceipt">
														<button class="bttn bttn-primary bttn-fill mt-2" >
																<i class="fa fa-image"></i> 
								      					<b align="center">Upload here</b>
														</button>
								      	</a>
							      </div>	
						    </div>
						 </div>
				</div>
		</div>


		{{-- Upload Receipts Modal --}}
   <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
              <div class="modal-header">
	                <div class="modal-title"><i class="fa fa-coins"></i> <b>Purchase Credits</b></div>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                  <span aria-hidden="true">&times;</span>
	                </button>
              </div>
              <div class="modal-body">
								   <form id="purchase" action="{{route('tapup.purchase')}}" method="POST">
								      @csrf
								      <div class="form-group">
								      		<label>Credits:</label>
								         <select name="tapup" class="form-control form-control-lg">
								         		<option value="">Choose here</option>
								         		<option>100</option>
								         		<option>200</option>
								         		<option>500</option>
								         		<option>1000</option>
								         		<option>1500</option>
								         		<option>2000</option>
								         		<option>3000</option>
								         		<option>5000</option>
								         		<option>8000</option>
								         		<option>10000</option>
								         		<option>10500</option>
								         		<option>20000</option>
								         </select>
								      </div>
								      <hr>
								      <div class="form-group">
								        <button type="submit" class="bttn bttn-fill bttn-primary btn-block btn-sm py-3">
								          <i class="fa fa-check"></i> Submit
								        </button>
								     </div>
								  </form>	
              </div>
              <div class="modal-footer">
              </div>
          </div>
        </div>
    </div>

     {{-- Upload Receipts Modal --}}
   <div class="modal fade" id="uploadReceipt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <div class="modal-title"></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
								   <form id="uploadReceiptForm" action="{{route('upload.receipt')}}" method="POST" enctype="multipart/form-data">
								      @csrf
								      <div class="form-group">
								          <h4>Transaction Number:</h4>
								   				<input type="text" name="order_number" class="form-control form-control-lg" id="order_number">
								      </div>

								      <div class="form-group">
								          <label>Upload Receipt:</label><br> 
								   				<input type="file" name="image" id="image"><br>
								   				<small class="text-secondary">2MB Maximum Size</small>
								      </div>
								      <hr>
								      <div class="form-group">
									        <button type="submit" class="bttn bttn-primary bttn-fill bttn-block py-2">
									          <i class="fa fa-check"></i> Submit
									        </button>
								     </div>
								  </form>	
              </div>

              <div class="modal-footer">
              </div>
          </div>
        </div>
    </div>

</div>
@endsection

@section('script')
<script>
		$(document).ready(function(){
				(function(){
			    document.querySelector('#uploadReceiptForm').addEventListener('submit', function(e){
			        e.preventDefault();

			        axios.post(this.action,{
			        	content-type: 'multipart/form-data',
			         	_token : document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
			          order_number : document.querySelector('#order_number').value,
			          image : document.querySelector('#image').value,
			        })

			        .then((response) => {
			        		// console.log(response)
			            // hide the modal
			            document.querySelector('#order_number').value = '';
			            $('#uploadReceipt').modal('hide'); 
			            window.location.reload(true);
			        })
			        .catch((error) => {
			            // console.log(error.response);
			            let errors = error.response.data.errors;
			            let firstItem = Object.keys(errors)[0];
			            let firstItemDOM = document.getElementById(firstItem);
			            let firstErrorMessage = errors[firstItem][0];

			            // remove all the error message
			            let errorMessages = document.querySelectorAll('.text-danger');
			            errorMessages.forEach((element) => element.textContent = '');

			            // show error message;
			            firstItemDOM.insertAdjacentHTML('afterend', `<div class="text-danger">${firstErrorMessage}</div>`);
			        });
			    });
			  })();
		});


	@if(session('success'))
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
	@endif 

	@if(session('error'))
			iziToast.error({
	      title: 'Error',
	      message: '{{session('error')}}',
	      // icon: 'ico-warning',
	      // iconColor: 'rgb(0, 255, 184)',
	      // theme: 'dark',
	      // progressBarColor: 'rgb(0, 255, 184)',
	      position: 'topCenter',
	      transitionIn: 'fadeInLeft',
	      transitionOut: 'fadeOutUp'
	    });
	@endif 

</script>
@endsection

