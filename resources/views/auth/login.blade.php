@extends('layouts.main')

@section('content')

    <div class="splash-container pt-5">
        <div class="card">
            <div class="card-header text-center">
                {{-- <img src="img/logo2.png" class="img-fluid" alt=""> --}}
                <h3 class="mb-1"><i class="fa fa-user-circle"></i> Login Form</h3>
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
                         <label>Email:</label>               
                        <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>Password:</label>       
                        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group my-3">
                        <i class="fa fa-chain"></i> <a href="{{ route('forgot.password') }}">Forgot Password</a>
                    </div>
                    
                    <button type="submit" class="btn btn-dark btn-lg btn-block">Sign in</button>

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
