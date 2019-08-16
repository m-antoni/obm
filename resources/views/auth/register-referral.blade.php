@extends('layouts.main')

@section('content')
    <!-- ============================================================== -->
    <!-- signup form  -->
    <!-- ============================================================== -->
    <form method="POST" action="{{ route('register.referral') }}" class="splash-container">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="mb-1"><i class="fa fa-user-circle"></i> Registrations Form</h3>
                <p class="text-dark">Please enter your user information.</p>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input id="first" type="text" class="form-control form-control-lg @error('first') is-invalid @enderror" name="first" value="{{ old('first') }}" required autocomplete="first" autofocus placeholder="First Name">

                    @error('first')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <input id="middle" type="text" class="form-control form-control-lg @error('middle') is-invalid @enderror" name="middle" value="{{ old('middle') }}" required autocomplete="middle" autofocus placeholder="Middle Name">

                    @error('middle')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>    
    
                <div class="form-group">
                    <input id="last" type="text" class="form-control form-control-lg @error('last') is-invalid @enderror" name="last" value="{{ old('last') }}" required autocomplete="last" autofocus placeholder="Last Name">

                    @error('last')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="phone" type="phone" class="form-control pt-2 form-control-lg @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Phone">

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <select name="city" class="form-control" id="exampleFormControlSelect1">
                      <option value="null">Choose City...</option>   
                      <option>Caloocan</option>
                      <option>Makati</option>
                      <option>San Juan</option>
                      <option>Pasig</option>
                      <option>Valenzuela</option>
                    </select>
                 
                    @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <select name="barangay" class="form-control" id="exampleFormControlSelect1">
                      <option value="null">Choose barangay...</option>   
                      <option>Bagong Silang</option>
                      <option>Sapang Putik</option>
                      <option>Makaneneng</option>
                    </select>
                 
                    @error('barangay')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-lg @error('zipcode') is-invalid @enderror" name="zipcode" required placeholder="zipcode">

                    @error('zipcode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>  

                <div class="form-group">
                     <textarea name="street"  class="form-control form-control-lg @error('street') is-invalid @enderror" rows="2" placeholder="Street">{{ old('street') }}</textarea>
                    
                    @error('street')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>    

                <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm">
                </div>
                
                <input type="hidden" name="referral_key">    

                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" type="submit">Register My Account</button>
                </div>
            </div>
            <div class="card-footer bg-white">
                <p class="text-dark">Already member? <a href="{{ route('login') }}" class="text-secondary">Login Here.</a></p>
            </div>
        </div>
    </form>

@endsection