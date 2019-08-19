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
                            {{ session('resent') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            <i class="fa fa-times"></i> {{session('error')}}
                        </div>
                    @endif
                    <form action="{{ route('verify.otp') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Enter The Code:</label>
                            <input type="text" name="otp" class="form-control">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="bttn bttn-primary bttn-fill bttn-block">
                                 SUBMIT
                            </button>
                        </div>
                    </form>    
                                                              
                    <a class="text-info mt-2" href="{{ route('resend') }}">
                        <b><i class="fa fa-hand-point-right"></i> {{ __('click here to resend another code') }}</b>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
