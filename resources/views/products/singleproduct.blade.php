@extends('layouts.app')

@section('content')
<div class="container customHeight" id="singleProduct">
    <section>
      <div class="row justify-content-center mb-5 mb-lg-0 no-gutters">
          <div class="col-md-4 col-sm-6 col-12 text-center text-lg-left">

            @if($product->image == 'noimage.jpg')
                <img src="/img/noimage.jpg" alt="img" class="img-fluid imgproduct">
            @else
                <img src="{{ $product->image }}" alt="img" class="img-fluid imgproduct">
            @endif

          </div>
          <div class="col-md-4 col-sm-6 col-12">
              <div class="text-center">
                <div class="container">
                    <div class="rounded-0">
                        <div class="card-body">
                             <div class="my-auto text-center text-lg-left mt-2">
                                <div id="p_name" class="text-success"><b>{{ $product->p_name }}</b></div>
                                
                                <p class="mb-0" id='price'>₱<span>{{ number_format($product->price) }}</span>
                                   &nbsp; <small class="text-secondary"><strike>₱{{$product->old_price}} </strike></small>
                                </p> 
                                  
                                 <button class="btn btn-link text-muted my-2" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fa fa-arrow-right"></i><b> view details</b> 
                                </button>

                                <div class="accordion mb-2" id="accordionCards">
                                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionCards">
                                        <div class="card">
                                            <div class="card-body text-left">
                                                <div><span class="text-muted">Category: <br></span> {{ $product->p_category}}</div>
                                                <br>
                                                <div><span class="text-muted text-justify">Description: <br></span> {{ $product->description }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
  
                                <div class="p-sm-12">
                                    
                                    <div class="btn-group-vertical">
                                        <a href="{{ route('order.cod', $product->id) }}">
                                        <button class="btn btn-outline-warning text-dark py-2 btn-block">
                                            <i class="fa fa-truck"></i> 
                                            <small> COD</small>
                                            </button>
                                        </a>  

                                        <a href="{{ route('order.bank', $product->id) }}">
                                        <button class="btn btn-outline-primary py-2 btn-block">
                                            <i class="fa fa-credit-card"></i> 
                                            <small> PAY ON BANK</small>
                                            </button>
                                        </a>

                                     {{--    <a href="#">
                                        <button class="btn btn-outline-dark py-2 btn-full">
                                            <i class="fa fa-coins"></i> 
                                            <small> BEEM BUCKS</small>
                                            </button>
                                        </a> --}}
                                    </div>
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