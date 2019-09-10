@extends('layouts.app')

@section('content')
		<div class="imageThumbnail">
	    <div class="row no-gutters">
	        <div class="col-md-4 col-sm-4 col-12">
	            <div class="imghome">
	                <img src="{{ asset('/img/grocery/rice.jpg') }}" alt="apparel" class="image mg-fluid">
	                <div class="middle">
	                    <div class="text">PASTA & RICE</div>
	                    <h4 class="text-dark"><b><a href="{{ route('rice') }}">CLICK HERE</a></b></h4>
	                </div>
	            </div>
	        </div>

	        <div class="col-md-4 col-sm-4 col-12">
	            <div class="imghome">
	                <img src="{{ asset('/img/grocery/fresh.jpg') }}" alt="apparel" class="image mg-fluid">
	                <div class="middle">
	                    <div class="text">FRESH</div>
	                     <h4 class="text-dark"><b><a href="#">CLICK HERE</a></b></h4>
	                </div>
	            </div>
	        </div>
			
	        <div class="col-md-4 col-sm-4 col-12">
	            <div class="imghome">
	                <img src="{{ asset('/img/grocery/bread.jpg') }}" alt="apparel" class="image mg-fluid">
	                <div class="middle">
	                    <div class="text">BREAD</div>
	                    <h4 class="text-dark"><b><a href="#">CLICK HERE</a></b></h4>
	                </div>
	            </div>
	        </div>
	
	        <div class="col-md-4 col-sm-4 col-12">
	            <div class="imghome">
	                <img src="{{ asset('/img/grocery/condiments.jpg') }}" alt="apparel" class="image mg-fluid">
	                <div class="middle">
	                    <div class="text">CONDIMENTS</div>
	                    <h4 class="text-dark"><b><a href="#">CLICK HERE</a></b></h4>
	                </div>
	            </div>
	        </div>

	        <div class="col-md-4 col-sm-4 col-12">
	            <div class="imghome">
	                <img src="{{ asset('/img/grocery/frozen.jpg') }}" alt="apparel" class="image mg-fluid">
	                <div class="middle">
	                    <div class="text">FROZEN</div>
	                     <h4 class="text-dark"><b><a href="#">CLICK HERE</a></b></h4>
	                </div>
	            </div>
	        </div>

	        <div class="col-md-4 col-sm-4 col-12">
	            <div class="imghome">
	                <img src="{{ asset('/img/grocery/veggies.jpg') }}" alt="apparel" class="image mg-fluid">
	                <div class="middle">
	                    <div class="text">VEGGIES</div>
	                    <h4 class="text-dark"><b><a href="#">CLICK HERE</a></b></h4>
	                </div>
	            </div>
	        </div>

	    </div>
		</div>
@endsection