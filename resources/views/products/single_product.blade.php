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

                      <div class="btn-group" role="group" aria-label="Basic example">
                        <button class="btn btn-link btn-sm" type="button" data-toggle="collapse" data-target="#collapseDetails" aria-expanded="false" aria-controls="collapseExample">
                          Click for details
                        </button>
                        <a href="{{route('show.all', $product->category)}}">
                            <button type="button" class="btn btn-info text-white">
                              <i class="fa fa-list"></i> SHOW ALL
                            </button>
                        </a>
                      </div>

                      <div class="collapse" id="collapseDetails">
                        <div class="card card-body">
                          <p>
                            {{$product->description}}
                          </p>
                        </div>
                      </div>            
  
                      <a href="{{ route('add.cart', $product->id) }}">
                          <button class="btn btn-info btn-block mt-2 p-3">
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

