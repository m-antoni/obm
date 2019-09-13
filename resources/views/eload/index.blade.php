@extends('layouts.app')

@section('content')

<div class="py-2">
</div>

@if (session('success'))
    <div class="alert alert-success my-2 mx-2" role="alert">
        <div><i class="fa fa-check"></i> {{ session('success')}}</div>
    </div>
@endif

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-6 col-6 pb-4">
            <a href="{{ route('globe') }}">
                <img src="{{ asset('/img/load/globe.jpg') }}" class="img-fluid">
            </a>
        </div>
        <div class="col-md-6 col-6 pb-4">
            <a href="{{ route('smart') }}">
                <img src="{{ asset('/img/load/smart.jpg') }}" class="img-fluid">
            </a>
        </div>
        <div class="col-md-6 col-6 pb-4">
            <a href="{{ route('sun') }}">
                <img src="{{ asset('/img/load/sun.jpg') }}" class="img-fluid">
            </a>
        </div>
        <div class="col-md-6 col-6 pb-4">
            <a href="{{ route('tnt') }}">
                <img src="{{ asset('/img/load/tnt.jpg') }}" class="img-fluid">
            </a>
        </div>
        <div class="col-md-6 col-6 pb-4">
            <a href="{{ route('tm') }}">
                <img src="{{ asset('/img/load/tm.jpg') }}" class="img-fluid">
            </a>
        </div>
        <div class="col-md-6 col-6 pb-4">
            <a href="{{ route('cherry') }}">
                <img src="{{ asset('/img/load/cherry.jpg') }}" class="img-fluid">
            </a>
        </div>
        <div class="col-md-6 col-6 pb-4">
            <a href="{{ route('cignal') }}">
                <img src="{{ asset('/img/load/cignal.jpg') }}" class="img-fluid">
            </a>
        </div>
        <div class="col-md-6 col-6 pb-4">
            <a href="{{ route('pldt') }}">
                <img src="{{ asset('/img/load/pldt.jpg') }}" class="img-fluid">
            </a>
        </div>
        <div class="col-md-6 col-6 pb-4">
            <a href="{{ route('steam') }}">
                <img src="{{ asset('/img/load/steam.jpg') }}" class="img-fluid">
            </a>
        </div>
    </div>
</div>

@endsection


