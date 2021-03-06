@extends('layouts.app')

@section('content')
<div class="py-5" style="background: #383c4a">
    <h2 align="center" class="text-white"><i class="fa fa-tag text-white"></i> INVOICE</h2>
</div>

<div class="">
<div id="invoice">
	<div class="toolbar hidden-print">
	    <div class="text-left">
	        {{-- <button id="printInvoice" class="btn btn-danger btn-sm"><i class="fa fa-print"></i> PRINT</button> --}}
          <a href="{{ route('list.orders') }}" class="btn btn-danger"> <i class="fa fa-arrow-circle-left"></i> Go Back</a>
	    </div>
	    <hr>
	</div>
  <div class="invoice overflow-auto">
      <div style="min-width: 500px">
          <header>
              <div class="row">
                  <div class="col">
                      <a href="#">
                      <img src="{{ asset('/img/logo.png')}}" alt="logo" class="img-fluid" width="70%">
                  </div>
                  <div class="col company-details">
                      <h2 class="name">
                 				<a href="#" class="text-info">
                 						ONEBEEM
                 				</a>
                      </h2>
                      <br>
                      {{-- <div>address</div> --}}
                      <div>(02) 692-3693</div>
                      <div>order@onebeem.com</div>
                  </div>
              </div>
          </header>
          <main>
              <div class="row contacts">
                  <div class="col invoice-to">
                      <div class="text-gray-light">INVOICE TO:</div>
                      <h2>{{$order->user->getFullNameAttribute()}}</h2>
                      <div>{{auth()->user()->email}}</div>
                      <div>{{$order->phone}}</div>
                      <div>{{$order->getFullAddressAttribute()}}</div>
                  </div>
                  <div class="col invoice-details">
                      <h1 class="invoice-id">INVOICE</h1>
                      <div class="date">Date of Invoice: {{$order->date->format('m-d-Y A')}}</div>
                      <div class="date text-dark">Order No: <strong>{{$order->order_number}}</strong></div>
                      <div>Payment Method: <b>{{$order->payment}}</b></div>

                      {{-- <div class="date">Due Date: 30/10/2018</div> --}}
                  </div>
              </div>
              <table border="0" cellspacing="0" cellpadding="0">
                  <thead>
                      <tr>
                          <th class="text-left">DESCRIPTION</th>
                          <th class="text-right">QUANTITY</th>
                          <th class="text-right">TOTAL</th>
                      </tr>
                  </thead>
                  <tbody>
                  		@foreach($cart['items'] as $item)
	                      <tr>
	                          <td class="text-left">
	                          	<h3>{{$item['item']['p_name']}}</h3>
	                          			{{$item['item']['description']}}
	                        	</td>
	                          <td class="qty">{{$item['qty']}}</td>
	                          <td class="total">Php {{ number_format($item['price'])}}</td>
	                      </tr>
											@endforeach
                  </tbody>
                  <tfoot>
                      <tr>
                          <td></td>
                          <td>TOTAL</td>
                          <td style="margin-top: 10px;">Php {{number_format($cart['totalPrice'])}}</td>
                      </tr>
                  </tfoot>
              </table>
              <div class="thanks" style="margin-top: 2px">Thank you!</div>
              <div class="notices">
                  <div>NOTICE:</div>
                  <div class="notice">
                       We will contact you when your order is ready..Thank you
                  </div>
              </div>
          </main>
          <footer>
                Invoice was created on a computer and is valid without the signature and seal.
          </footer>
      </div>
      <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
      <div></div>
  </div>
</div>
</div>

@endsection


@section('script')
	<script>
			 $('#printInvoice').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data) 
            {
                window.print();
                return true;
            }
        });
	</script>
@endsection