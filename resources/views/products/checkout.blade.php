@extends('layouts.main')

@section('content')

<div class="splash-container">
    <div class="card">
        <div class="card-header text-center bg-dark py-3">
            {{-- <img src="img/logo.png" class="img-fluid" alt=""> --}}
            
            <span class="splash-description text-white">
                 CHECK OUT BEEMS
            </span>
            {{-- <h4 class="text-white"></h4> --}}
        </div>
        <div class="card-body">
            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf
                    <div class="list-group mb-2">
                        <div class="list-group-item">
                            @foreach($products->items as $item )
                            <div>- {{Str::limit($item['item']['p_name'], 25)}}</div>
                          
                            @endforeach
                            <hr>
                            <div>Total Quantity: {{$products->totalQty}}</div>
                            <div>Total Amount: Php {{ number_format($products->totalPrice) }}</div>
                        </div>
                    </div>

                    <div class="list-group">
                        <div class="list-group-item">
                            <label class="text-primary">Default Shipping:</label>

                            <span class="float-right">
                                <a href="#" class="text-danger" data-toggle="modal" data-target="#addModal">
                                  Edit <i class="fa fa-edit"></i>
                                </a> 
                            </span>

                            <div>
                                @if($detail)
                                  <div class="text-dark"> Phone: </div>
                                    {{$detail->phone}}  
                                    <input type="hidden" name="phone" value="{{$detail->phone}}">
                                    <div class="text-dark"> City: </div>
                                    {{$detail->city}}
                                    <input type="hidden" name="city" value="{{$detail->city}}">  
                                    <div class="text-dark"> Barangay: </div>
                                    {{$detail->barangay}} | {{$detail->zipcode}}
                                    <input type="hidden" name="barangay" value="{{$detail->barangay}}">
                                    <input type="hidden" name="zipcode" value="{{$detail->zipcode}}">
                                    <div class="text-dark"> Street: </div>
                                    {{$detail->street}}
                                    <input type="hidden" name="street" value="{{$detail->street}}">
                                @else
                                   <div class="text-dark"> Phone: </div>
                                    {{auth()->user()->phone}}  
                                    <input type="hidden" name="phone" value="{{auth()->user()->phone}}">
                                    <div class="text-dark"> City: </div>
                                    {{auth()->user()->city}}
                                    <input type="hidden" name="city" value="{{auth()->user()->city}}">  
                                    <div class="text-dark"> Barangay: </div>
                                    {{auth()->user()->barangay}} | {{auth()->user()->zipcode}}
                                    <input type="hidden" name="barangay" value="{{auth()->user()->barangay}}">
                                    <input type="hidden" name="zipcode" value="{{auth()->user()->zipcode}}">
                                    <div class="text-dark"> Street: </div>
                                    {{auth()->user()->street}}
                                    <input type="hidden" name="street" value="{{auth()->user()->street}}">
                                @endif
                            </div>
                        </div>

                <a href="#" class="btn btn-outline-dark btn-block mt-3" data-toggle="modal" data-target="#confirmModal">
                  <i class="fa fa-send"></i> 
                    Place your order  
                </a>           

                {{-- Confirm Modal --}}
                <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <h4 align="center"> Are you sure?</h4>
                            <h4 align="center">
                              <button type="submit" class="btn btn-outline-dark py-2"><i class="fa fa-check"></i> Confirm</button>
                            </h4>
                          </div>
                          <div class="modal-footer">
                          </div>
                      </div>
                    </div>
                </div>
            </form>
        </div>
        
        <div class="card-footer bg-white p-0">
            <div class="card-footer-item card-footer-item-bordered">
              <a href="{{ route('shopping.cart') }}" class="footer-link"><i class="fa fa-arrow-left"></i> Cancel</a>
            </div>
        </div>
    </div>
</div>


  
    {{-- Edit New Modal --}}
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-dolly"></i> Shippping Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="addForm" action="{{ route('add.details') }}" method="POST">
                    @csrf
                    <div class="form-group">
                      <input type="text" name="phone" class="form-control" placeholder="Enter your phone" id="phone">
                    </div>
                    
                    <div class="form-group">
                        <select name="city" class="form-control dynamic" id="city" data-dependent="barangay">
                           <option value="">Choose City</option>
                           @foreach($address as $row)
                              <option value="{{$row->city}}">{{$row->city}}</option>
                           @endforeach   
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="barangay" class="form-control dynamic"  id="barangay" data-dependent="zipcode">
                          <option value="">Choose Barangay</option>
                           @foreach($barangay as $row)
                              <option value="{{$row->barangay}}">{{$row->barangay}}</option>
                           @endforeach   
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="zipcode" class="form-control dynamic" id="zipcode">
                          <option value="">Choose Zipcode</option>
                           @foreach($zipcode as $row)
                              <option value="{{$row->zipcode}}">{{$row->zipcode}}</option>
                           @endforeach    
                        </select>
                    </div>
               
                    <div class="form-group">
                        <textarea name="street" rows="3" class="form-control" placeholder="Street" id="street"></textarea>
                    </div>

                    <hr>
                    <div class="form-group">
                      <button type="submit" class="btn btn-outline-dark btn-block py-2 my-2">
                        <i class="fa fa-check"></i> Submit
                      </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>

@endsection


@section('script')

<script>
    $(document).ready(function(){
          // ADD NEW SHIPPING ADDRESS
         (function(){
          document.querySelector('#addForm').addEventListener('submit', function(e){
              e.preventDefault();

              axios.post( this.action, {
                  _token : document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                  phone : document.querySelector('#phone').value,
                  city : document.querySelector('#city').value,
                  barangay : document.querySelector('#barangay').value,
                  zipcode : document.querySelector('#zipcode').value,
                  street : document.querySelector('#street').value,
              })
              .then((response) => {
                // alert(123);
                  // hide the modal
                  $('#addModal').modal('hide'); 
                  document.querySelector('#phone').value = '';
                  document.querySelector('#city').value = '';
                  document.querySelector('#barangay').value = '';
                  document.querySelector('#zipcode').value = '';
                  document.querySelector('#street').value = '';
                  // document.querySelector('#isDefault').checked = false;

                  window.location.reload(true);
              })
              .catch((error) => {
                  // console.log(error.response);
                  let errors = error.response.data.errors;
                  let firstItem = Object.keys(errors)[0];
                  let firstItemDOM = document.getElementById(firstItem);
                  let firstErrorMessage = errors[firstItem][0];

                  // remove all the error message
                  let errorMessages = document.querySelectorAll('.text-danger');
                  errorMessages.forEach((element) => element.textContent = '');

                  // show error message;
                  firstItemDOM.insertAdjacentHTML('afterend', `<div class="text-danger">${firstErrorMessage}</div>`);
              });
          })
        })();

        @if(session('success'))
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
        @endif

    });

  </script>  

@endsection