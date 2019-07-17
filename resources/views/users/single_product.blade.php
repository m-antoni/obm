@extends('layouts.app')

@section('content')
<div class="container">
    <section>
      <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
          <div class="col-sm-6 col-md-4 text-center text-lg-left">

            @if($product->image == null)
                <img src="/img/products/1.jpg" alt="img" class="img-fluid">
            @else
                <img src="{{ asset('storage/' . $product->image) }}" alt="img" class="img-thumbnail" style="width: 500px">
            @endif

            {{-- <img class="img-fluid" src="/img/products/{{$product->image}}.jpg"> --}}
          </div>
          <div class="col-sm-6 col-md-4">
              <div class="text-center">
                <div class="container">
                    <div class="card rounded-0">
                        <div class="card-body">
                             <div class="w-100 my-auto text-center text-lg-left mt-4">
                                <h5><b>{{$product->p_name}}</b></h5>
                                
                                <p class="mb-0">Php <span id='price'>{{ $product->price }}</span> </p> 
                                  <small class="text-secondary"><strike>Php 500.00 </strike></small>
                               
                                <p class="p-1 text-center text-lg-left">
                                    {{$product->description}}
                                </p>
                                <div class="p-2">
                                    <a href="{{ route('order.cod', $product->id) }}" class="btn btn-primary btn-block rounded-0">
                                        <small><i class="fa fa-truck"></i>  CASH ON DELIVERY</small>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <a href="{{ route('order.bank', $product->id) }}" class="btn btn-warning btn-lg btn-block rounded-0">
                                      <small> <i class="fa fa-university"></i> PAY ON BANK</small>
                                   </a>
                                </div>
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