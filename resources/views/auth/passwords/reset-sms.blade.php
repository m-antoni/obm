@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card mt-5">
                <div class="card-body mt-3">

                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ session('resent') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('forgotpass.reset') }}">
                        @csrf

                        <div class="form-group">
                            <input type="hidden" class="form-control" name="email" value="{{ $user->email }}">
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('New Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
        
                        <div class="form-group">
                            <button type="submit" class="btn btn-dark btn-block">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </form>

                    <a class="text-primary mt-3" data-wow-delay="2s" href="{{ route('resend') }}">
                        <b><i class="fa fa-hand-point-right"></i> {{ __('click here to resend another code') }}</b>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection