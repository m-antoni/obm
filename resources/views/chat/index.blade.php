@extends('layouts.app')

@section('content')
<div class="container customHeight">
		<div class="row justify-content-center">
				<div class="col-md-6">
					<div class="card-title"><h5><i class="fa fa-users"></i> List Of Friends</h5></div>
						<div class="list-group">
								<div class="list-group-item">
										@forelse($friends as $friend)
											<div>
												<a href="{{route('chat.show', $friend->id)}}" class="list-group-item list-group-item-action">{{$friend->getFullNameattribute()}}</a>
												
											</div>
										@empty
												<div><h4>You don't have any friends.</h4></div>
										@endforelse
								</div>
						</div>
				</div>
		</div>
</div>
@endsection