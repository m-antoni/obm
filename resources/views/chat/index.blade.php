@extends('layouts.app')

@section('content')
<div class="container customHeight">
	
		{{-- this is chats component --}}
			<chat :user="{{auth()->user()}}"></chat>

</div>
@endsection