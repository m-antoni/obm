@extends('layouts.app')

@section('content')
<div class="container customHeight">
    <section>
      <div class="row justify-content-center mb-5 mb-lg-0 no-gutters">
          <div class="col-md-4 col-6 text-center text-lg-left">

            @if($product->image == 'noimage.jpg')
                <img src="/img/noimage.jpg" alt="img" class="img-fluid" style="width: 400px;">
            @else
                <img src="{{ $product->image }}" alt="img" class="img-fluid" style="width: 400px;">
            @endif

          </div>
          <div class="col-md-4 col-6">
              <div class="text-center">
                <div class="container">
                    <div class=" rounded-0">
                       
                        <div class="card-body">
                             <div class="my-auto text-center text-lg-left mt-4">
                                <h4><b>{{ $product->p_name }}</b></h4>
                                
                                <p class="mb-0">Php <span id='price'>{{ number_format($product->price) }}</span> &nbsp; <small class="text-secondary"><strike>Php 500.00 </strike></small></p> 
                                  
                               
                                 <button class="btn btn-link text-muted my-3" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fa fa-arrow-right"></i> view details
                                </button>
                                <div class="accordion mb-2" id="accordionCards">
                                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionCards">
                                        <div class="card">
                                            <div class="card-body text-left">
                                                <div><span class="text-muted">Category:</span> {{ $product->p_category}}</div>
                                                <br>
                                                <div><span class="text-muted">Description:</span> {{ $product->description }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
  
                                <div class="p-sm-2">

                                      <a href="{{ route('order.cod', $product->id) }}">
                                      <button class="btn btn--m btn--gray-dark btn-lg p-2">
                                          <i class="fa fa-truck"></i> 
                                          <small> COD</small>
                                          </button>
                                      </a>  


                                    <a href="{{ route('order.bank', $product->id) }}">
                                    <button class="btn btn--m btn--black btn-lg p-2">
                                        <i class="fa fa-database"></i> 
                                        <small> BEEM BUCKS</small>
                                        </button>
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