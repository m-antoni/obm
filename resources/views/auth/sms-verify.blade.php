@extends('layouts.app')

@section('content')
    <div class="py-5 mb-4" style="background: #eaeaea">
            <h2 align="center" class="text-info">SMS Verification</h2>
    </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 col-sm-6 col-10">
            <div class="card">

                <div class="card-body text-secondary">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    
                    <form action="{{ route('verify.otp') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Enter The Code:</label>
                            <input type="text" name="opt" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-outline-dark py-2" value="submit">
                        </div>
                    </form>    
                                                              
                    <a class="text-info" href="#">
                        <b><i class="fa fa-hand-point-right"></i> {{ __('click here to resend another code') }}</b>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
