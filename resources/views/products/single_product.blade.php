@extends('layouts.app')

@section('content')

    <div class="container customHeight mb-4" id="products">
      <div class="row justify-content-center">
          <div class="col-md-6">
              <div class="list-group">
                  <div class="list-group-item">
                      <img src="{{$product->image}}" class="img-fluid">
                      <h4 class="text-dark">{{Str::limit($product->p_name)}}</h4>

                      <h4 class="text-dark">Php{{number_format($product->price)}} | <s class="text-danger">SRP:₱{{$product->old_price}}</s></h4>
                      
                      <div class="clearfix my-3">
                          <div class="float-left">
                              <button class="btn btn-outline-primary btn-sm" type="button" data-toggle="collapse" data-target="#collapseDetails" aria-expanded="false" aria-controls="collapseExample">
                                Click for details
                              </button>
                          </div>
                          <div class="float-right">
                               <a href="{{route('show.all', $product->category)}}" class="btn btn-outline-dark btn-sm float-right">
                                  <b><i class="fa fa-list"></i> SHOW ALL</b>
                              </a>
                          </div>
                      </div>

                      <div class="collapse" id="collapseDetails">
                        <div class="card card-body">
                          <p>
                            {{$product->description}}
                          </p>
                        </div>
                      </div>            
  
                      <a href="{{ route('add.cart', $product->id) }}">
                          <button class="bttn bttn-primary bttn-block bttn-simple mt-2">
                          <i class="fa fa-shopping-cart"></i> 
                            ADD TO CART
                          </button>
                      </a>
                  </div>
              </div>
          </div>
      </div>         
    </div>

@endsection

