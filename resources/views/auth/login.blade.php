@extends('layouts.main')

@section('content')

    <div class="splash-container pt-5">
        <div class="card rounded-0">
            <div class="card-header text-center">
                <img src="img/logo.png" class="img-fluid" alt="">
                {{-- <p class="text-dark">Please enter your user information.</p> --}}
                {{-- <span class="splash-description">Please enter your user information.</span> --}}
            </div>
            <div class="card-body">
                @if(Session::has('message'))
                    <div class="alert alert-success">
                         {{ Session::get('message') }}   
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">

                        <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">

                        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
              {{--       <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                        </label>
                    </div> --}}
                    
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>

                </form>
            </div>
            <div class="card-footer bg-white p-3">
                <div class="clearfix container">
                    <a href="/" class="float-left">Go Back</a>
            
                    <a href="{{ route('register') }}" class="float-right">Create An Account</a></div>
                </div>
            </div>
        </div>
    </div>
  
 @endsection

