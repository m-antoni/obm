@extends('layouts.app')

@section('content')
	<div class="py-5 mb-3" style="background: #eaeaea">
			<h2 align="center" class="text-dark">ORDER CONFIRMATION</h2>
	</div>
	<div class="container mb-4">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card my-2 border-dark">
					<div class="card-body">
						<h4 class="text-secondary" align="center">
							<span class="text-info">
								Order No:
							</span> {{$ordernumber}}

							<p class="lead mt-2" align="center">We sent an Invoice to your email</p>
						</h4>

						@if($payment == 'PAY ON BANK')	
							<ul class="list-group mt-4">
								<li class="list-group-item border-dark">
									<div class="mb-2"><b>Payment Procedure:</b></div>
									<ol class="px-2">
										<li>Deposit or Transfer Payment to our account numbers below</li>
											<div align="center" class="py-2 text-danger"><b>Metrobank: 2657265514410</b></div>
										<li>Upload your receipt here 
											<a href="#" class="btn btn-sm btn-outline-dark btn-sm p-1" data-toggle="modal" data-target="#uploadReceipt" align="center">click here</a>
										</li>
										<li>Give us 24 hrs to process your payment</li>
									</ol>
								</li>
							</ul>
						@else
							<hr class="my-4">
							<h4 class="text-secondary" align="center">Php {{number_format($totalprice)}}</h4>
							<div align="center">Please have this amount ready</div>
						@endif
					</div>
				</div>

				<div class="mt-3" align="center">
						<a href="{{route('list.orders')}}" class="btn btn-sm btn-outline-dark py-2">
							Go to your Client Area
						</a>
				</div>
				
				<div class="mt-3">
						If you have any questions about your order, contact us on
					 	(02) 692-3693 <span class="text-info">order@onebeem.com</span>
				</div>
			</div>
		</div>
	</div>


	 {{-- Upload Receipts Modal --}}
    <div class="modal fade" id="uploadReceipt" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-image"></i> Upload Receipt</h4>
                 <button type="button" class="close" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <form id="submitForm" action="{{route('upload.receipt')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                          <label>Order Number:</label>
                   				<input type="text" name="order_number" class="form-control" id="order_number">
                      </div>

                      <div class="form-group">
                          <label>Upload Receipt:</label><br>
                   				<input type="file" name="image" id="image">
                      </div>
                      <hr>
                      <div class="form-group">
                        <button type="submit" class="btn btn-dark btn-block btn-sm py-2 border-dark">
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

@endsection


@section('script')

<script>
$(document).ready(function(){
		(function(){
	    document.querySelector('#submitForm').addEventListener('submit', function(e){
	        e.preventDefault();

	        axios.post(this.action, {
	         	Content-Type: 'multipart/form-data',     
	          _token : document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
	          order_number : document.querySelector('#order_number').value,
	          image : document.querySelector('#image').value,
	        })
	        .then((response) => {
	        		console.log(response)
	            // hide the modal
	            document.querySelector('#order_number').value = '';
	            $('#uploadReceipt').modal('hide'); 
	            location.reload();
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
</script>



@endsection