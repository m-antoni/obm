@extends('layouts.app')

@section('content')
	<div class="py-5 mb-3" style="background: #eaeaea">
			<h2 align="center" class="text-info">ORDER CONFIRMATION</h2>
	</div>
	<div class="container mb-4">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card my-2">
					<div class="card-body">
						<h4 align="center">
							<span class="text-info">Order No:</span> {{$ordernumber}}
						</h4>
						<br>
						<h5 align="center" class="text-muted">Give us 24 hrs to process your payment</h5 align="center">
						<h5 align="center" class="text-muted"><i class="fa fa-coins"></i> Credits: {{number_format(auth()->user()->credits)}}</h5>
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

	</script>


	@if(session('success'))
		<script>
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

	@if(session('error'))
		<script>
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
		</script>
	@endif 

@endsection