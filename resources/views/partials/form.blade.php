  <div class="form-group">
      <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" placeholder="Fullname">

      @error('name')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>  

  <div class="form-group">
      
      <input type="text" class="form-control form-control-lg @error('phone') is-invalid @enderror" name="phone" placeholder="Phone">

      @error('phone')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>
  
  <div class="form-group">
      <textarea name="address" class="form-control form-control-lg @error('address') is-invalid @enderror"rows="2" placeholder="Billing Address"></textarea>

      @error('address')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>

  <hr>

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

{{-- @section('script')
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
@endsection --}}