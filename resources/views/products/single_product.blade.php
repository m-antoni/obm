@extends('layouts.app')

@section('content')
<div class="container customHeight" id="singleProduct">
    <section>
      <div class="row justify-content-center mb-5 mb-lg-0 no-gutters">
          <div class="col-md-4 col-sm-6 col-12 text-center text-lg-left">
              <img src="{{ $product->image }}" alt="img" class="img-fluid" id="singleImage">
          </div>
          <div class="col-md-4 col-sm-6 col-12">
              <div class="text-center">
                <div class="container">
                    <div class="rounded-0">
                        <div class="card-body">
                             <div class="my-auto text-center text-lg-left mt-2">
                                <div id="p_name" class="text-info"><b>{{ $product->p_name }}</b></div>
                                
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
                                                <div><span class="text-muted">Category: <br></span> {{ ucfirst($product->category)}}</div>
                            
                                                <div><span class="text-muted text-justify">Description: <br></span> {{ $product->description }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
  
                                <div class="p-sm-12">
                                    
                                    <div class="btn-group-vertical">
                                        
                                      <a href="{{ route('add.cart', $product->id) }}">
                                          <button class="btn btn-outline-primary btn-block mt-2">
                                          <i class="fa fa-shopping-cart"></i> 
                                            <small>ADD TO CART</small>
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
      </div>
    </section>
</div>
@endsection