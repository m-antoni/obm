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
                            <div class="float-right"><a href="{{route('generate.invoice', $item->id)}}" class="text-info">
                              <i class="fa fa-tag"></i> INVOICE</a></div>
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

 {{-- Upload Receipts Modal --}}
  {{--  <div class="modal fade" id="uploadReceipt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <div class="modal-title"><i class="fa fa-upload"></i> Upload File</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                  <div class="modal-body">
                       <form id="uploadReceiptForm" action="{{route('post.receipt')}}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group">
                              <label>Order Number:</label>
                              <input type="text" name="order_number" class="form-control" id="order_number">
                          </div>

                          <div class="form-group">
                               <label>Upload Receipt:</label><br>
                               <input type="file" name="image" id="image">
                               <small class="text-secondary">2MB Maximum Size</small>
                          </div>
                          <hr>
                          <div class="form-group">
                            <button type="submit" class="btn btn-dark btn-block btn-sm py-2 border-dark">
                              <i class="fa fa-check"></i> Submit
                            </button>
                         </div>
                      </form>   
                  </div>

              <div class="modal-footer">
              </div>
          </div>
        </div>
    </div> --}}

@endsection
