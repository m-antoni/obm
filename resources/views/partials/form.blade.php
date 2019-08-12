  {{-- <div class="form-group">
      <input type="text" class="form-control form-control @error('first') is-invalid @enderror" name="first" placeholder="First Name">

      @error('first')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div> 

  <div class="form-group">
      <input type="text" class="form-control form-control @error('middle') is-invalid @enderror" name="middle" placeholder="Middle Name">

      @error('middle')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div> 

  <div class="form-group">
      <input type="text" class="form-control form-control @error('last') is-invalid @enderror" name="last" placeholder="Last Name">

      @error('last')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>  --}}

  <div class="form-group">
      
      <label>Phone</label>
      <span class="float-right">
          <a href="#" class="text-danger" data-toggle="modal" data-target="#ediPhone">
            Edit <i class="fa fa-edit"></i></a> 
        </span>
      <input type="text" class="form-control form-control @error('phone') is-invalid @enderror mb-3" name="phone" value="{{auth()->user()->phone}}" disabled> 
      @error('phone')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>
  
  <div class="form-group">
      <label>Default Address</label> 
        <span class="float-right">
          <a href="#" class="text-danger" data-toggle="modal" data-target="#ediAddress">
            Edit <i class="fa fa-edit"></i></a> 
        </span>
      <textarea name="address" class="form-control form-control @error('address') is-invalid @enderror"rows="4" disabled>
        {{auth()->user()->address}}
      </textarea>

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
