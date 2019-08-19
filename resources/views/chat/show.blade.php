@extends('layouts.app')

@section('content')
<meta name="friendId" content="{{ $friend->id }}">
<div class="container customHeight">
		<div class="row justify-content-center">
				<div class="col-md-6">
						<div class="card">
								<div class="card-body">
										<div class="card-title"><h5>{{$friend->getFullNameAttribute()}}</h5></div>
										<div class="card-body">

												{{-- chat component vue --}}
												<chat v-bind:chats="chats"></chat>

										</div>
								</div>
								<div class="card-footer">
										<a href="{{ route('chat') }}">
												<button class="bttn bttn-primary bttn-sm bttn-simple">Go Back</button>
										</a>
								</div>
						</div>
				</div>
		</div>
</div>
@endsection