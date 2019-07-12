@extends('layouts.app')

@section('content')
		<div class="container">
				<h2>Place Your Order</h2><hr>
				<form action="POST" method="">
						@csrf
						<div class="form-group">
								<label>Order by:</label>
								<input type="text" name="name" class="form-control">
						</div>
						<div class="form-group">
								<label>Delivery Address:</label>
								<input type="text" name="address" class="form-control">
						</div>
						<div class="form-group">
								<label>Phone:</label>
								<input type="text" name="phone" class="form-control">
						</div>
						<div class="form-group">
							<label>Quantity</label>
              <select name="quantity" class="form-control" id="quantity" onchange="updateTotal()">
                    @for($i=1; $i < 100; $i++)
                        <option>{!! $i !!}</option>
                    @endfor
              </select>
						</div>
						<div class="form-group">
								<input type="text" class="btn btn-primary btn-lg" value="Submit now">
						</div>	
				</form>
		</div>
@endsection