@extends('layouts.main')

@section('content')

<div class="splash-container">
    <div class="card">
      	<div class="card-header text-center bg-dark py-3">
            {{-- <img src="img/logo.png" class="img-fluid" alt=""> --}}
            </a><span class="splash-description text-white"><i class="fa fa-dolly"></i> CASH ON DELIVERY</span>
            {{-- <h4 class="text-white"></h4> --}}
        </div>
        <div class="card-body">
            <form action="{{ route('cod.store') }}" method="POST">
	              @csrf
                    <div class="list-group mb-2">
                        <div class="list-group-item">
                            @foreach($products->items as $item )
                            <div>- {{Str::limit($item['item']['p_name'], 30)}}</div>
                          
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
                                <a href="#" class="text-danger" data-toggle="modal" data-target="#addNew">
                                  Add <i class="fa fa-plus-circle"></i>
                                </a> 
                            </span>

                            <div>
                                @if($isDefault)
                                  <div class="text-dark"> Phone: </div>
                                    {{$isDefault->phone}}  
                                    <input type="hidden" name="phone" value="{{$isDefault->phone}}">
                                  <div class="text-dark"> Address: </div>  
                                    {{$isDefault->address}}
                                    <input type="hidden" name="address" value="{{$isDefault->address}}">
                                @else
                                  <div class="text-dark"> Phone: </div>
                                    {{auth()->user()->phone}}  
                                    <input type="hidden" name="phone" value="{{auth()->user()->phone}}">
                                  <div class="text-dark"> Address: </div>  
                                    {{auth()->user()->address}}
                                    <input type="hidden" name="address" value="{{auth()->user()->address}}">
                                @endif
                            </div>

                            <div>
                              @if(count($details) > 0)
                                <a href="#" class="btn btn-primary btn-block mt-3 btn-sm" 
                                data-toggle="modal" data-target="#chooseAnother">
                                    <i class="fa fa-send"></i> 
                                      Choose Another  
                                </a> 
                              @endif 
                            </div>
                        </div>
                      
                    </div>
                <hr>

                <a href="#" class="btn btn-outline-dark btn-block mt-3" data-toggle="modal" data-target="#confirmModal">
                    <i class="fa fa-send"></i> 
                      Place your order  
                </a>           

                {{-- Confirm Modal --}}
                <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <h4  align="center"> Are you sure?</h4>
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

    
    {{-- Choose Another Modal --}}
    <div class="modal fade" id="chooseAnother" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-dolly"></i> Choose Another</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <form action="{{ route('update.details') }}" method="POST" id="chooseAnotherForm">
                      @csrf
                      <div class="form-group">
                          <label>Choose One</label>
                          <select name="id" class="form-control" id="selectOptions">
                            @foreach($details as $row)
                              <option value="{{$row->id}}">
                                {{$row->phone}} | {{Str::limit($row->address, 15)}}
                              </option>
                            @endforeach
                          </select>  
                      </div>
                      <hr>
                      <div class="form-group">
                        <button type="submit" class="btn btn-outline-dark btn-block btn-sm">
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


    {{-- Add New Details Modal --}}
    <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-dolly"></i> Add New</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <form id="addNewForm" action="{{ route('add.details') }}" method="POST">
                      @csrf
                      <div class="form-group">
                        <input type="text" name="phone" class="form-control form-control-lg" placeholder="Enter your phone" id="phone">
                      </div>

                      <div class="form-group">
                          <textarea name="address" rows="4" class="form-control" placeholder="Shipping Address" id="address"></textarea>
                      </div>

                      <div class="form-group">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" name="isDefault" id="isDefault">
                          <label class="form-check-label" for="isDefault">Set as default</label>
                        </div>
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
        (function(){
          document.querySelector('#addNewForm').addEventListener('submit', function(e){
              e.preventDefault();

              axios.post(this.action, {
                  _token : document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                  phone : document.querySelector('#phone').value,
                  address : document.querySelector('#address').value,
                  isDefault: document.querySelector('#isDefault').checked,
              })
              .then((response) => {
                  // hide the modal
                  $('#addNew').modal('hide'); 
                  document.querySelector('#phone').value = '';
                  document.querySelector('#address').value = '';
                  document.querySelector('#isDefault').checked = false;

                  window.location.reload();
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


        (function(){
            document.querySelector('#chooseAnotherForm').addEventListener('submit', function(e){
                e.preventDefault();

                axios.post(this.action, {
                    _token : document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    id : document.querySelector('#selectOptions').value,
                })
                .then((response) => {

                    // hide the modal
                    $('#chooseAnother').modal('hide');
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