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
                  <h1><b>{{$product->p_name}}</b></h1>
                  
                  <h2 class="mb-0">Php <span id='price'>{{ $product->price }}</span><h4 class="text-secondary"><strike>Php 500.00 </strike></h4></h2> 
                  <hr class="p-1">
                  <p class="p-1 text-justify">
                      {{$product->description}}
                  </p>
                  <hr>
                  <p align="center">Payment Method</p>
                  <div class="p-2">
                     <a href="{{ route('order.cod', $product->id) }}" class="btn btn-primary btn-lg btn-block rounded-0"> CASH ON DELIVERY</a>
                  </div>
                  <div class="p-2">
                      <a href="{{ route('order.bank', $product->id) }}" class="btn btn-warning btn-lg btn-block rounded-0"> PAY ON BANK</a>
                  </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection