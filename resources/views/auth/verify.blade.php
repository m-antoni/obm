@extends('layouts.app')

@section('content')
    <div class="py-5 mb-4" style="background: #eaeaea">
        <h2 align="center" class="text-info">EMAIL VERIFICATION</h2>
    </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                {{-- <div class="card-header"><img src="{{ asset('/img/logo.jpeg') }}" alt="" class="img-fluid"></div> --}}

                <div class="card-body text-secondary">
                    <h4>{{ __('Verify Your Email Address') }}</h4>
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your phone.') }}
                        </div>
                    @endif

                    <p>
                        Before proceeding, please check your email for a verification link.
                        If you did not receive the email.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
