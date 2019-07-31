@extends('layouts.app')

@section('content')
  
    <!-- Header -->
  <header class="masthead">
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
        <h1 class="mx-auto my-0 text-uppercase">ONE BEEM</h1>
        <h2 class="text-white-50 mx-auto mt-2 mb-5 text-info">Everything on one beem</h2>
        <a href="{{ route('login') }}" class="btn btn-outline-danger p-2 btn-full"><h3>Shop NOW</h3></a>
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


