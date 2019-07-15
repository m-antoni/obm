@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="clearfix pb-2">
                <div class="float-left"></div>
                  <div class="float-right">
                    <div class="btn-group" role="group" aria-label="Basic example">
                          <a href="{{ route('myorders') }}" class="btn btn-warning rounded-0"><i class="fa fa-list"></i>MY ORDER</a>
                            <a href="{{ route('products') }}" class="btn btn-primary rounded-0"><i class="fa fa-shopping-cart"></i>  SHOP</a>
                        </div>
                  </div>
            </div>

            <div class="card">
                <div class="card-header p-4">
                     {{-- <a class="pt-2 d-inline-block" href="index.html">Order Summary</a> --}}
                    <div class="float-left"> 
                        <h4>Order Summary</h4>
                        Payment: {{ strtoupper($order->payment)}}
                    </div>   
                    <div class="float-right"> 
                        <h5 class="mb-0">Ref No. #{{$order->reference}}</h5>
                        Date: {{ $order->date->format('m-j-Y') }}
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-6">
{{--                             <h5>To:</h5> --}}
                            <h4 class="text-dark mb-1">{{ $order->user->name }}</h4>                   
                            <div>{{ $order->user->address }}</div>
                            <div>{{ $order->user->city }}</div>
                            <div>{{$order->user->email}}</div>
                            <div>{{$order->user->phone}}</div>
                        </div>
                    </div>
                    <div class="table-responsive-sm">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Description</th>
                                    <th class="right">Unit Cost</th>
                                    <th class="center">Qty</th>
                                    <th class="right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="left strong">{{ $order->product->p_name}}</td>
                                    <td class="left">{{ $order->product->p_category}}</td>
                                    <td class="right">₱ {{$order->product->price}}</td>
                                    <td class="center">{{ $order->quantity }}</td>
                                    <td class="right">₱ {{ $order->price }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5">
                        </div>
                        <div class="col-lg-4 col-sm-5 ml-auto">
                            <table class="table table-clear">
                                <tbody>
                                    <tr>
                                        <td class="left">
                                            <strong class="text-dark">Subtotal</strong>
                                        </td>
                                        <td class="right">₱ {{ $order->price }}</td>
                                    </tr>
                                    <tr>
                                        <td class="left">
                                            <strong class="text-dark">Shipping</strong>
                                        </td>
                                        <td class="right">FREE</td>
                                    </tr>
                                    {{-- <tr>
                                        <td class="left">
                                            <strong class="text-dark">Discount (20%)</strong>
                                        </td>
                                        <td class="right">0%</td>
                                    </tr> --}}
                              {{--       <tr>
                                        <td class="left">
                                            <strong class="text-dark">VAT (10%)</strong>
                                        </td>
                                        <td class="right">0%</td>
                                    </tr> --}}
                                    <tr>
                                        <td class="left">
                                            <strong class="text-dark">Total</strong>
                                        </td>
                                        <td class="right">
                                            <strong class="text-dark">₱ {{ $order->price }}</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-secondary">
                    <p class="text-justify text-white">
                        @if($order->payment == 'cod')
                            Note: Please save your REFERENCE NO. your items will be deliver 3 to 5 days upon purchase.
                            for any assitance please call us. 1209-3084-3948
                        @else
                            Note: You may deposit your payment to our exclusive <a href="#" class="text-warning" data-toggle="modal" data-target="#bankaccount">bank accounts</a>, please dont forget to include your REFERENCE NO.
                            or your transaction may void. for any assitance please call us. 1209-3084-3948
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="bankaccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header bg-primary text-white">
            <h5 class="modal-title">Exclusive Bank Accounts</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                
            <h4 align="center">BDO: 123-456-7890</h4>
            <h4 align="center">SECURITY BANK: 123-456-7890</h4>
            <h4 align="center">BPI: 123-456-7890</h4>
                
          </div>
      {{--     <div class="modal-footer text-center">
                
          </div> --}}
      </div>
    </div>
</div>
@endsection

@section('script')
	@if(session('success'))
		<script type="text/javascript">
				iziToast.success({
					  title: 'Success',
					  message: '{{session('success')}}',
					 	icon: 'ico-success',
					  // iconColor: 'rgb(0, 255, 184)',
					  // theme: 'dark',
					  // progressBarColor: 'rgb(0, 255, 184)',
					  position: 'topCenter',
					  transitionIn: 'fadeInLeft',
					  transitionOut: 'fadeOutUp'
				});
		</script>
	@endif
@endsection