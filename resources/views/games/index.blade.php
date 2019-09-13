@extends('layouts.app')

@section('content')

<div class="py-5" style="background: #00b0ff">
    <h2 align="center" class="text-white">PLAY GAMES</h2>
</div>

<div class="container">
    <div class="row justify-content-center text-center px-0">
        <div class="col-md-8 col-10 mt-4">
           <div class="row homeicons">
                <div class="col-4 pb-4">
                    <a href="{{ route('games.quiz') }}">
                        <i class="ti ti-light-bulb fa-2x"></i>
                        <div><b>Quiz Game</b></div>
                    </a>
                </div>

             {{-- <div class="col-4">
                    <a href="#" data-toggle="modal" data-target="#moreicons">
                      <i class="ti ti-more-alt fa-3x"></i>
                      <div><b>More</b></div>
                    </a>
                </div> --}}
           </div> 
        </div>
    </div>
</div>

@endsection