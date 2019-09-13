@extends('layouts.app')

@section('content')

<div class="py-5" style="background: #00b0ff">
    <h2 align="center" class="text-white">E-books</h2>
</div>

<div class="container">
    <div class="row justify-content-center text-center px-0 mt-4">
        <div class="col-md-8 col-10">
           <div class="row homeicons">
                <div class="col-4 pb-4">
                    <a href="{{ route('quotes') }}">
                        <i class="ti ti-light-bulb fa-2x"></i>
                        <div><b>Quotes</b></div>
                    </a>
                </div>
                <div class="col-4 pb-4">
                    <a href="#">
                        <i class="ti ti-book fa-2x"></i>
                        <div><b>Book 1</b></div>
                    </a>
                </div>
                 <div class="col-4 pb-4">
                    <a href="#">
                        <i class="ti ti-book fa-2x"></i>
                        <div><b>Book 2</b></div>
                    </a>
                </div>
                 <div class="col-4 pb-4">
                    <a href="#">
                        <i class="ti ti-book fa-2x"></i>
                        <div><b>Book 3</b></div>
                    </a>
                </div>
           </div> 
        </div>
    </div>
</div>

@endsection
