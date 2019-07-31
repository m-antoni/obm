@extends('layouts.app')

@section('content')

<div class="container customHeight">
     @foreach($orders as $order)
    <div class="row justify-content-center mb-4">
        <div class="col-lg-6 col-md-8 col-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <b> {{ $order->reference_id}}</b>
                </div>
                <div class="card-body">
                      @foreach($order->cart->items as $item)
                        <ul class="list-group">
                            <li class="list-group-item">{{ $item['item']['p_name'] }} / {{$item['qty']}} Qty  /  ₱{{ number_format($item['price'])}}</li>
                        </ul>
                          
                      @endforeach   
                      <div class="float-right pt-2"><b>Total Amount: ₱{{ number_format($order->cart->totalPrice)}}</b>     </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>


@endsection
