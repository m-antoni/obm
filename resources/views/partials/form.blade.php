
  <div class="form-group">
      <input  type="text" class="form-control form-control-lg" name="email" value="{{  auth()->user()->getFullNameAttribute() }}" disabled>
  </div>

  <div class="form-group">

      <input type="text" class="form-control form-control-lg @error('phone') is-invalid @enderror" name="phone"  value="{{ auth()->user()->phone }}">

      @error('phone')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>
  
  <div class="form-group">
      <input type="text" class="form-control form-control-lg @error('address') is-invalid @enderror" name="address"  value="{{ auth()->user()->address }}">

      @error('address')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>
  <hr>
  <div class="form-group">
      <div class="row justify-content-center">
            <div class="col-md-6 mb-2">
                <label>Quantity</label>
                <input class="form-control rounded-0" type="number" name="quantity" min="1" max="99" value="1" id="quantity" onchange="updateTotal()">
                <input type="text" name="price" id="totalhidden" class="form-control" value="{{ $product->price}}" hidden>
            </div>
                  
            <div class="col-md-6">
                <label>Total Amount</label>
                <h5>Php <span id="total"><b>{{ number_format($product->price) }}</b></span></h5>
            </div>
      </div>
  </div>

    <a href="#" class="btn btn-outline-dark btn-block" data-toggle="modal" data-target="#confirmModal">
         
        <i class="fa fa-send"></i> 
          Place your order  
    </a>           

    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                {{-- <img src="/img/logo.jpeg" class="img-fluid" alt="logo"> --}}
                <h4  align="center"> Are you sure?</h4>
                <h4 align="center">
                  <button type="submit" class="btn btn-outline-dark py-2"><i class="fa fa-check"></i> Confirm</button>
                </h4>
                
              </div>
              <div class="modal-footer">
                  {{-- <p>DC GROUP OF COMPANIES</p> --}}
              </div>
          </div>
        </div>
    </div>

@section('script')
  <script>
      function getTotal(){
          document.getElementById('total').innerHTML = "{{ $product->price }}";  
      }
      
      getTotal();

      function updateTotal(){
          let quantity = document.getElementById('quantity').value;
          let price = parseInt({{$product->price}});

          total = document.getElementById('totalhidden').value = quantity * parseFloat(price);  

          if(total == '' & total == null){
              document.getElementById('total').value = "{{ $product->price }}";
          }else{
              document.getElementById('total').innerHTML = quantity * parseFloat(price);
          }   
      }
  </script>
@endsection