@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header"><img src="{{ asset('/img/logo.jpeg') }}" alt="" class="img-fluid"></div>

                <div class="card-body">
                    <h4>{{ __('Verify Your Email Address') }}</h4>
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <br> <a class="text-primary" href="{{ route('verification.resend') }}"><b>{{ __('click here to request another') }}</b></a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
