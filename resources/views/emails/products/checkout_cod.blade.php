<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'One Beem') }}</title>
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:700|Roboto:700&display=swap" rel="stylesheet">
    <!-- Custom CSS STYLES -->
		
<style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title h2{
        font-size: 30px;
/*        line-height: 45px;*/
        color: #3490dc;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
   	
    .invoice-box table tr.heading td {
        background: #3490dc;
        color: #fff;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
/*    .invoice-box table tr.item.last td {
        border-bottom: none;
    }*/
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>
  <body>
          <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                               <b><h2>ONE BEEM</h2></b>
                            </td>
                            <td>
                               
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                            		{{$data->user->getFullNameAttribute()}}<br>
                            		{{auth()->user()->email}} <br>
                            		{{$data->phone}} <br>
                                {{$data->address}}<br>
                               
                            </td>
                            
                            <td>
                                <b>INVOICE</b><br>
                              	Created: {{ $data->date->format('m-d-Y') }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Payment Method
                </td>
                
                <td>
                   {{$data->payment}}
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    ORDER NUMBER
                </td>
                
                <td>
                    {{$data->order_number}}
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Item
                </td>
                
                <td>
                    Price
                </td>
            </tr>
     
  			  @foreach($data->cart->items as $item)        
            <tr class="item">
                <td>
                    {{$item['item']['p_name']}}
                </td>
                
                <td>
                   Php {{ number_format($item['price'])}}
                </td>
            </tr>
          @endforeach  
            <tr class="total">
                <td></td>
                
                <td>
                   Total: Php {{number_format($data->cart->totalPrice)}}
                </td>
            </tr>
        </table>
    </div>

  </body>
</html>




