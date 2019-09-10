@extends('layouts.app')

@section('content')

<div class="py-5 mb-4" style="background: #383c4a">
    <h2 align="center" class="text-white">BEEM CREDITS</h2>
    <h4 align="center"><i class="fa fa-coins fa-2x text-white"></i></h4>
</div>

<div class="container">
		<div class="row justify-content-center">
				<div class="col-md-6 mb-5">

						@if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif

						<h4>Step 1</h4>
						<p class="text-muted">First Purchase Beem Credits</p>
						<div class="list-group">
						    <div class="list-group-item py-4" align="center">
						      	<div class="card my-3 w-70">
						      			<div class="card-body">
						      					<h4 class="text-muted"><i class="fa fa-coins"></i> {{number_format($credits)}}</h4>
						      				  <div class="text-primary"><b>Current Beem Credits</b></div>
						      			</div>
						      	</div>

						      	<div class="card my-3 w-70">
						      			<div class="card-body">
						      					<h4 class="text-muted"><i class="fa fa-coins"></i> {{$pending ? number_format($pending->credits) : 0}}</h4>
						      				  <div class="text-danger"><b>Pending</b></div>
						      			</div>
						      	</div>
										
										@if(!$pending)
						      	<a href="#" data-toggle="modal" data-target="#creditsModal">
												<button class="bttn-primary bttn-jelly bttn-lg bttn-material-circle" >
														<i class="fa fa-coins"></i> 
												</button>
						      	</a>
						      	@else
										<div class="alert alert-danger">
												<h5>You have a pending request.</h5>
										</div>	
						      	@endif
						    </div>
						 </div>

						<h4 class="mt-4">Step 2</h4>
						<p class="text-muted">Bank Transfer to this account</p>
						<div class="list-group">
						    <div class="list-group-item" align="center">
						      <h1><i class="fa fa-university fa-2x"></i></h1>
						   		<h1>2657265514410</h1>
						   		<h4 class="text-primary">Metrobank Account Number</h4>
						    </div>
						 </div>

						<h4 class="mt-4">Step 3</h4>
						<p class="text-muted">Upload your Transaction Receipt</p>
						<div class="text-muted">
							<div class="list-group mb-5">
						    <div class="list-group-item" align="center">
							      <a href="{{route('show.receipt')}}">
												<button class="btn btn-link" >
														<h4 class="fa fa-image fa-2x text-dark"></h4> 
						      					<b align="center"><h4>Upload Here</h4></b>
												</button>
						      	</a>
						    </div>
						 </div>
			      </div>	 
				</div>
		</div>
		
	{{-- Upload Receipts Modal --}}
  <div class="modal fade" id="creditsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 999999;">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
              <div class="modal-header">
	                <div class="modal-title"><i class="fa fa-coins"></i> <b>Purchase Beems</b></div>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                  <span aria-hidden="true">&times;</span>
	                </button>
              </div>
              <div class="modal-body">
								   <form id="creditsForm" action="{{route('post.credits')}}" method="POST">
								      @csrf
								      <div class="form-group">
								      		<div class="alert alert-danger">minimum of 300 purchase</div>
								      	 	<label>Enter Amount</label>
								         	<input type="text" id="credits" name="credits" placeholder="Enter Amount" class="form-control">
								      </div>
								      <hr>
								      <div class="form-group">
								        <button type="submit" class="btn btn-primary btn-block btn-lg">
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
			    document.querySelector('#creditsForm').addEventListener('submit', function(e){
			        e.preventDefault();

			        axios.post(this.action,{
			         	_token : document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
			          credits : document.querySelector('#credits').value,
			        })

			        .then((response) => {
			        		// console.log(response)
			            // hide the modal
			            $('#creditsModal').modal('hide'); 
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

		});// document.ready
</script>

{{-- 	@if(session('success'))
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
	@endif  --}}

@endsection

