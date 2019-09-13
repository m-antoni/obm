@extends('layouts.app')

@section('content')
<div class="py-5" style="background: #00b0ff">
    <h2 align="center" class="text-white">Bills Payment</h2>
    <h5 align="center" class="text-white"><b>History</b></h5>
</div>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8 mt-3">
			
			<a href="{{ route('bills') }}" class="btn btn-outline-dark btn-sm my-2"><i class="ti-arrow-left"></i> Back</a>

			<div class="accordion mb-4" id="billshistory">
				@if(count($history) > 0)
					@foreach($history as $row)
					  <div class="card">
						    <div class="card-header bg-dark">
						      <h2 class="mb-0">
						        <button class="btn btn-link" 
						        		type="button" data-toggle="collapse" 
						        		data-target="#collapsable{{$row->id}}"
						        		style="text-decoration: none;">
						          	<span class="text-white">{{ $row->date->format('m-d-Y') . ' | ' . $row->purpose }}</span>
						        </button>
						      </h2>
						    </div>

						    <div id="collapsable{{$row->id}}" class="collapse" data-parent="#billshistory">
							      <div class="card-body">
							        <div>Purpose: {{$row->purpose}}</div>
							        <div>Transaction Number: {{$row->order_number}}</div>
							        <div>Ref Number: {{$row->reference_number}}</div>
							        <div>Amount: {{number_format($row->amount)}}</div>
							      </div>
						    </div>
					  </div>
					@endforeach
				@else
					<h5 class="text-center mt-4">
							<b>You don't have any transaction.</b>
					</h5>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection