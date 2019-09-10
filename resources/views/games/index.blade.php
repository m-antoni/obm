@extends('layouts.app')

@section('content')

<div id="jumbotron" class="jumbotron jumbotron-fluid py-5">
    <div align="center" class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                  <img src="{{ asset('/img/logo2.png') }}" class="img-fluid text-center">
            </div>
        </div>
    </div>
</div>


<h4 align="center"><i class="ti ti-game"></i> PLAY GAMES</h4>

<div class="container">
    <div class="row justify-content-center text-center px-0">
        <div class="col-md-8 col-10">
           <div class="row homeicons">
                <div class="col-4 pb-4">
                    <a href="{{ route('games.quiz') }}">
                        <i class="ti ti-light-bulb fa-2x"></i>
                        <div><b>Quiz Game</b></div>
                    </a>
                </div>

             {{--    <div class="col-4">
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