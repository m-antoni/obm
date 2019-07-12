@extends('layouts.app')

@section('content')
<div class="container">

<section>
  <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
    <div class="col-sm-6">
      <img class="img-fluid" src="/img/products/{{$product->image}}.jpg" alt="">
    </div>

    <div class="col-sm-6">
      <div class="text-center h-100 project">
        <div class="container">
          <div class="project-text w-100 my-auto text-center text-lg-left">
            <div>
                @csrf
                <h1><b>{{$product->p_name}}</b></h1>
                <h4 class="text-secondary"><strike>Php 500.00 </strike></h4>
                <h2 class="mb-0">Php <span id='price'>{{ $product->price }}</span></h2> 
                <hr class="p-1">
                <p class="p-1 text-justify">
                  {{$product->description}}
                </p>
                <div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
</div>

@endsection