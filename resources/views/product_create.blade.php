@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row justify-content-center">
				<div class="col-md-6">
							<div class="clearfix">
							  <span class="float-left"><h3>PLACE YOUR ORDER</h3></span>
							  <span class="float-right"></span>
							</div>

							{{-- Validation errors --}}
              @if($errors->any())
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><i class="fa fa-warning"></i> Error</strong> Something went wrong...
                    @foreach($errors->all() as $error)
                        <ul>
                          	<li>{{$error}}</li>
                        </ul>
                    @endforeach
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>  
              @endif
							<form method="POST" action="{{ route('product.post', ['product_id' => $product->id]) }}">
									@csrf
									<div class="form-group">
											<label>Name</label>
											<input type="text" class="form-control form-control-lg rounded-0" name="name" value="{{ auth()->user()->name }}" disabled>
									</div>

									<div class="form-group">
											<label>Phone</label>
											<input type="text" class="form-control form-control-lg rounded-0 @error('phone') is-invalid @enderror" name="phone" value="{{ auth()->user()->phone}}">
										 
										 	@error('phone')
	                        <span class="invalid-feedback" role="alert">
	                            <strong>{{ $message }}</strong>
	                        </span>
	                    @enderror
									</div>

									<div class="form-group">
											<label>Delivery Address</label>
											<textarea name="address" class="form-control form-control-lg rounded-0 @error('address') is-invalid @enderror" name="address" rows="2">{{ auth()->user()->address}}</textarea>
											
											@error('address')
	                        <span class="invalid-feedback" role="alert">
	                            <strong>{{ $message }}</strong>
	                        </span>
	                    @enderror	

									</div>

                  <div class="form-group">
	                    <div class="row justify-content-center">
		                      <div class="col-md-6 mb-2">
		                          <label>Quantity</label>
		                          <input class="form-control rounded-0" type="number" min="1" max="99" value="1" id="quantity" onchange="updateTotal()">
		                          <input type="text" name="price" id="totalhidden" class="form-control form-control-lg" value="{{$product->price}}" hidden>
		                      </div>
		                          
		                      <div class="col-md-6">
		                          <label>Total Amount</label>
		                          <h3>Php <span id="total">{{ $product->price }}</span></h3>
		                      </div>
	                    </div>
                  </div>
									<hr>
									<div class="clearfix">
									  	<span class="float-left"><a href="{{ route('product', $product->id) }}" class="btn btn-outline-danger mb-2 rounded-0">cancel</a></span>
									  	<span class="float-right">	<a href="#" class="btn btn-primary btn-lg rounded-0" 
									  	data-toggle="modal" data-target="#confirmModal">Place your order<a>
									  	</span>
									</div>

									<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="exampleModalLabel"></h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body">
										      		<h4 align="center">Are you sure to place this order?</h4>
										      		<hr>
															<span><input type="submit" class="btn btn-primary btn-block btn-lg rounded-0" value="confirm"></span>
										      </div>
										      <div class="modal-footer">
										        	{{-- <p>DC GROUP OF COMPANIES</p> --}}
										      </div>
										    </div>
										  </div>
										</div>

							</form>
				</div>
		</div>
	</div>
	

@endsection

@section('script')
  <script>
      function getTotal(){
          document.getElementById('total').innerHTML = "{{ $product->price }}";  
      }
      
      getTotal();

      function updateTotal(){
          let quantity = document.getElementById('quantity').value;
          let price = parseInt({{$product->price}});

          total = document.getElementById('totalhidden').value = quantity * parseFloat(price);  

          if(total == '' & total == null){
              document.getElementById('total').value = "{{ $product->price }}";
          }else{
              document.getElementById('total').innerHTML = quantity * parseFloat(price);
          }   
      }
  </script>
@endsection