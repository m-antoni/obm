@extends('layouts.app')

@section('content')
  
    <!-- Header -->
  <header class="masthead">
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
        <h1 class="mx-auto my-0 text-uppercase">ONE BEEM</h1>
        <h2 class="text-white-50 mx-auto mt-2 mb-3">Everything on one beem</h2>
        <a href="{{ route('login') }}" class="btn btn-outline-link text-white">
            <i class="fa fa-shopping-cart"></i>
            Shop NOW
        </a>
      </div>
    </div>
  </header>

  <!-- Footer -->
  <footer class="bg-black small text-center text-white-50">
    <div class="container">
      <h5>Copyright &copy; ONE BEEM 2019</h5>
    </div>
  </footer>

@endsection


