@extends('layouts.app')

@section('content')

<div class="py-5 mb-3" style="background: #eaeaea">
    <h2 align="center" class="text-dark"><i class="fa fa-dolly"></i> ORDER HISTORY</h2>
</div>
<div class="container">
    <div class="row justify-content-center mb-4">
         @if(count($orders) > 0)   
            <div class="col-lg-6 mb-3">
                <ul class="list-group">
                  @foreach($orders as $item)
                    <li class="list-group-item">
                        <div class="clearfix float-sm-none">
                            <div class="float-left text-secondary">
                                <i class="fa fa-calendar"></i> {{$item->date->format('m-d-Y')}}
                            </div>
                            <div class="float-right">
                              <a href="{{route('generate.invoice', $item->id)}}" class="text-info">
                              <i class="fa fa-tag"></i> INVOICE</a>
                            </div>
                        </div>
                    </li>
                    @endforeach
                    <li class="list-group-item mt-2">
                        <div>
                            <p>Purchase Beem Credits  <a href="{{route('show.credits')}}" class="text-info" align="center">Click here</a></p>
                        </div>
                    </li>
                </ul>
            </div>
        @else
              <div><h2 align="center"><b>You don't have any orders yet..</b></h2></div>
        @endif
    </div>
</div>

@endsection
