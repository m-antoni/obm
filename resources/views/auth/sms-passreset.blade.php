@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 col-12">
            <div class="card mt-5 py-2">
                <div class="card-body text-secondary">

                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ session('resent') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            <i class="fa fa-exclamation-triangle"></i> {{session('error')}}
                        </div>
                    @endif

                    @if(Cache::get('OTP') != null)

                        <form action="{{ route('verify.otp.password') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="wow fadeInDown">Enter The Code:</label>
                                <input type="text" name="code" class="@error('code') is-invalid @enderror form-control mb-3">

                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-dark btn-block wow fadeInUp">
                                     SUBMIT
                                </button>
                            </div>
                        </form>    
                                                                  
                        <a class="text-primary mt-3 wow fadeInLeft" data-wow-delay="2s" href="{{ route('resend.password.otp') }}">
                            <b><i class="fa fa-hand-point-right"></i> {{ __('click here to resend another code') }}</b>
                        </a>

                    @else

                        <form action="{{ route('forgot.verify.otp') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-dark btn-block">
                                    {{ __('Send code to verify') }}
                                </button>
                            </div>
                        </form>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        new WOW().init();
    });
</script>
@endsection
