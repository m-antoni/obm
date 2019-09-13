@extends('layouts.app')

@section('content')
<div class="py-5" style="background: #00b0ff">
    <h2 align="center" class="text-white">{{$provider->provider}}</h2>
</div>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6 mt-2">
			<a href="{{ route('load') }}" class="btn btn-dark btn-sm">
				<i class="ti ti-arrow-left"></i> Go Back
			</a>

			<div class="list-group mt-3">
				@foreach($promos as $row)
				  <a href="{{ route('load.form', $row->id) }}" class="list-group-item list-group-item-action"><h5>{{ $row->promo}}</h5> </a> 
				@endforeach
			</div>
		</div>
	</div>
</div>

@endsection