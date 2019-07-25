@extends('layouts.app')

@section('content')

<div class="container customHeight">
    <div class="row justify-content-start">
        <div class="offset-xl-2 col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
            <div class="clearfix pb-2">
                <div class="float-left"></div>
                  <div class="float-right">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('myorders') }}">
                            <button class="btn btn--l btn--gray-border">
                                <i class="fa fa-clipboard-check"></i> ORDERS
                            </button>
                        </a>
                           &nbsp; 
                        <a href="{{ route('products') }}">
                        <button class="btn btn--m btn--gray-dark ">
                            <i class="fa fa-shopping-cart"></i> 
                                SHOP
                            </button>
                        </a>
                    </div>
                  </div>
            </div>

            <div class="card rounded-0" id="summary">
                <div class="card-header p-3">
                     {{-- <a class="pt-2 d-inline-block" href="index.html">Order Summary</a> --}}
                    <div class="float-md-left float-sm-none"> 
                        
                    </div>   
                    <div class="float-md-right float-sm-none"> 
                        <div class="text-dark"><b>Ref No: {{$order->reference}}</b></div>
                        <div>{{ $order->date->format('m-j-Y') }}</div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="text-dark mb-3"><b>{{ $order->user->getFullNameAttribute() }}</b> </div>
                    <div class="table-responsive-sm">
                        <table class="table table-hover table-sm">
                            <thead class="p-2">
                                <tr>
                                    <th>Item</th>
                                    <th class="right"> Cost</th>
                                    <th class="center">Qty</th>
                                    <th class="right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="left strong">{{ $order->product->p_name}}</td>
                                    <td class="right">₱{{ number_format($order->product->price)}}</td>
                                    <td class="center">{{ $order->quantity }}</td>
                                    <td class="right">₱{{ number_format($order->price) }}</td>
                                </tr>
                                <tr>
                                    <td><td>
                                    <td><b>Subtotal</b></td>
                                    <td>₱{{number_format($order->price)}}</td>
                                </tr>
                                <tr>
                                    <td><td>
                                    <td><b>Total</b></td>
                                    <td>₱{{ number_format($order->price)}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer">
                    <p class="text-justify">
                        @if($order->payment == 'cod')
                            Note: FREE SHIPPING only around Metro Manila, your items will be delivered 3 to 5 days upon purchase.
                            for any assitance please call us. <span class="text-primary"> <b>(02) 692-3693</b> </span>
                        @else
                            Note: You may deposit your payment to our exclusive <a href="#" class="text-info" data-toggle="modal" data-target="#bankaccount">BANK ACCOUNTS</a>, don't forget to include your REFERENCE NO.
                            or your transaction may void. for any assitance please call us.<b>(02) 692-3693</b> 
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
          <div class="modal-header">
                <div class="modal-title">Exclusive Bank Accounts</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
          </div>
          <div class="modal-body contact bg-secondary text-white">
            <div align="center"><b>Metrobank</b></div>
            <div align="center"><b>DC Multinational Megacorp Inc.</b></div>
            <div align="center"><b>2657265514410</b></div>
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