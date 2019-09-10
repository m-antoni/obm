@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 col-10">
            <div class="card mt-5 py-2">
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
                            <label class="wow fadeInDown">Enter The Code:</label>
                            <input type="text" name="otp" class="form-control mb-3 wow fadeInDown">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-dark btn-block wow fadeInUp">
                                 SUBMIT
                            </button>
                        </div>
                    </form>    
                                                              
                    <a class="text-primary mt-3 wow fadeInLeft" data-wow-delay="2s" href="{{ route('resend') }}">
                        <b><i class="fa fa-hand-point-right"></i> {{ __('click here to resend another code') }}</b>
                    </a>
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
