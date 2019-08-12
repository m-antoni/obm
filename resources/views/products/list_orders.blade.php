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
                            <p>For those who pay over the counter upload your receipts <a href="#" class="text-info" data-toggle="modal" data-target="#uploadReceipt" align="center">click here</a></p>
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
   <div class="modal fade" id="uploadReceipt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <div class="modal-title"><i class="fa fa-upload"></i> Upload File</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                  <div class="modal-body">
                       <form id="uploadReceiptForm" action="{{route('upload.receipt')}}" method="POST" enctype="multipart/form-data">
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
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            (function(){
                document.querySelector('#uploadReceiptForm').addEventListener('submit', function(e){
                    e.preventDefault();

                    axios.post(this.action, {
                        content-type: 'multipart/form-data',
                        _token : document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                         order_number : document.querySelector('#order_number').value,
                        image : document.querySelector('#image').value,
                    })
                    .then((response) => {
                        // hide the modal
                        document.querySelector('#order_number').value = '';
                        $('#uploadReceipt').modal('hide'); 
                        window.location.reload(true);
                    })
                    .catch((error) => {
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
                });
            })();
        });
    </script>


    @if(session('success'))
        <script>
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

    @if(session('error'))
        <script>
              iziToast.error({
              title: 'Error',
              message: '{{session('error')}}',
              // icon: 'ico-warning',
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
