
@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row justify-content-center mb-4 no-gutters">
    <div class="col-md-12">
        <div class="card my-2">
          <div class="card-body">
            <div class="row">
              <div class="col-md-3">
                <div class="list-group mb-4">
                  <div class="list-group-item">
                    
                    @if(auth()->user()->image == null)
                      <img src="{{ asset('/img/noimage.jpg') }}" alt="img1" class="img-fluid" >
                    @else
                      <div align="center">
                          <img src="{{ asset('/storage/' . auth()->user()->image ) }}" alt="" class="card-img-bottom">
                      </div>
                    @endif
                    
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-primary btn-sm btn-block" data-toggle="collapse" href="#updateImage" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Update Image</a>
                            
                            <div class="collapse multi-collapse mt-3"  id="updateImage">
                                <form action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mt-2">
                                      <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="customFileLang" lang="es">
                                        <label class="custom-file-label" for="customFileLang">Upload Here</label>
                                      </div>

                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        
                                        <button type="submit" class="btn btn-primary btn-block mt-4">
                                          <i class="fa fa-image"></i> 
                                            Submit
                                        </button> 
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>  
                  

                    <div class="card">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item"><i class="fa fa-user"></i> <b>{{auth()->user()->getFullNameAttribute()}}</b> </li>
                              <li class="list-group-item"> {{auth()->user()->phone}}</li>
                              <li class="list-group-item">{{auth()->user()->email}}</li>
                              <li class="list-group-item">{{auth()->user()->getFullAddressAttribute()}}</li>
                            </ul>
                        </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-9">
                @if (Session::has('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <i class="fa fa-check"></i> <b>Success!</b> {{ Session::get('success') }}

                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                @endif
                <div class="card">
                  {{-- <div class="card-header">Profile Page</div> --}}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="col-12">
                                  <div class="alert alert-info alert-dismissible fade show" role="alert">
                                     <h4>PURCHASE CREDITS</h4>
                                      <a href="{{ route('show.credits') }}">
                                          <button class="bttn bttn-primary bttn-sm bttn-stretch">
                                              Click Here
                                          </button>
                                      </a>

                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                                        </li>
                                        <li class="nav-item">
                                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                                        </li>
                                        <li class="nav-item">
                                          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#history" role="tab"> <i class="fa fa-tag"></i> Order History</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                           @if(auth()->user()->card == false)
                                              <div class="imageThumbnail mt-2">
                                                  <div class="alert alert-info alert-dismissible fade show" role="alert">
                                                        Get Your One Beem Master Debit Card. 
                                                        <strong><i class="fa fa-credit-card"></i> FOR FREE!</strong> 
                                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                  </div>
                                                  <div class="imghome">
                                                      <a href="{{ route('card.register') }}"><img src="{{ asset('/img/debitcard.jpg')}}" alt="apparel" class="image mg-fluid"></a>
                                                      <div class="middle">
                                                          <div class="text">SUBMIT CREDENTIALS</div>
                                                           <a href="{{ route('card.register') }}"><h4 class="text-dark"><b>CLICK HERE</b></a>
                                                      </div>
                                                  </div>
                                              </div>
                                          @endif  
                                      
                                      </div>
                                      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        

                                      </div>
                                      <div class="tab-pane fade" id="history" role="tabpanel">
                                          <div class="mt-2 table-responsive-sm">
                                            @if(count($orders) > 0)
                                              <table class="table table-striped table-hover">
                                                  <thead class="bg-primary text-white">
                                                      <tr>
                                                          <th>Order No</th>
                                                          <th>Date</th>
                                                          <th>Payment</th>
                                                          <th>Action</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      @foreach($orders as $row)
                                                        <tr>
                                                            <td>{{$row->order_number}}</td>
                                                            <td>{{$row->date->format('m-d-Y')}}</td>
                                                            <td>{{$row->payment}}</td>
                                                            <td>
                                                                <a href="{{route('generate.invoice', $row->id)}}">
                                                                  <button class="bttn bttn-sm bttn-fill bttn-danger">
                                                                      <i class="fa fa-tag"></i> Invoice
                                                                  </button>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                      @endforeach
                                                  </tbody>
                                              </table>
                                              @else
                                                <div class="alert alert-danger">
                                                    <h4>You don't have order history...</h4>
                                                </div>
                                              @endif
                                          </div>
                                      </div>
                                    </div>                    
                                </div> {{-- col-12 --}}
                            </div>{{-- col-md-8 --}}

                            <div class="col-md-4">
                              <div class="alert alert-dark">
                                  <h5>Total: <i class="fa fa-coins"></i> {{ number_format(auth()->user()->credits) }} BCS</h5>
                              </div>
                              
                              <div class="card">
                                  <div align="center" class="card-body">
                                      <a href="{{ route('chats') }}">
                                          <button class="bttn bttn-sm bttn-primary bttn-stretch">
                                             Contact Us
                                          </button>
                                      </a>
                                  </div>
                              </div>

                              <div class="card">
                                  <div class="card-body">
                                      <div align="center">
                                         <a data-toggle="collapse" href="#formRefer" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
                                            <button class="bttn bttn-primary bttn-stretch bttn-sm">
                                                <i class="fa fa-user-circle"></i> REFER A FRIEND
                                            </button>
                                         </a>
                                      </div>
                                     
                                      <div class="collapse multi-collapse" id="formRefer">
                                          <div class="card card-body mt-2 bg-dark text-white">
                                              <div class="text-white mb-2">Get additional 50 Beems</div>
                                               <form action="{{route('referral.send')}}" method="POST">
                                                  @csrf
                                                  <div class="form-group">
                                                      <input id="email" name="email" class="form-control" placeholder="enter email address">
                                                  </div>
                                                  <hr>
                                                  <div class="form-group">
                                                    <button type="submit" class="bttn bttn-fill bttn-primary btn-block bttn-sm">
                                                      <i class="fa fa-chain"></i> Send Link
                                                    </button>
                                                 </div>
                                               </form>  
                                          </div>
                                      </div>
                                 </div>
                              </div>

                              <div class="card">
                                  <div class="card-body">
                                      <div align="center">
                                          <a data-toggle="collapse" href="#referrals" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"> 
                                              <button class="bttn bttn-primary bttn-stretch bttn-sm">
                                                  <i class="fa fa-users"></i> REFERRED USERS
                                              </button>
                                          </a>
                                      </div>
                                      <div class="collapse multi-collapse mt-2"  id="referrals">
                                          @if(count($referrals) > 0)
                                            <ul class="list-group">
                                                @foreach($referrals as $refer)
                                                <li class="list-group-item">
                                                    <i class="fa fa-user-circle"></i> {{ $refer->getFullNameAttribute()}}
                                                </li>
                                                @endforeach
                                            </ul>
                                          @else
                                              <div class="alert alert-danger">
                                                  <p>you dont have any referrals</p>
                                              </div>
                                          @endif
                                      </div>
                                  </div>
                              </div>


                              <div class="card">
                                  <div class="card-body">
                                        <a class="btn btn-dark btn-block" data-toggle="collapse" href="#bills" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Bills & Payment</a>
                                        
                                        <div class="collapse multi-collapse mt-2 show"  id="bills">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <a href="{{ route('creditcard.loans') }}">Credit Card / Loans</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="{{ route('insurance') }}">Insurance</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="{{ route('utility') }}">Utility</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="{{ route('telco') }}">Telecommunications</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="{{ route('cable') }}">Cable / Internet</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="{{ route('government') }}">Government Payments</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="{{ route('others') }}">OTHERS</a>
                                                </li>
                                            </ul>
                                        </div>
                                  </div>
                              </div>
                         </div>
                    </div>
                  </div>
                </div>
              </div>  
            </div>
          </div>
        </div>
    </div>
  </div>

    <div class="row no-gutters">
        <div class="col-md-6">
            <img src="{{'/img/shop/electronics.jpg'}}" alt="elec" class="img-fluid">
            <h1 align="center" class="display-4"> <span class="text-danger">LIVE STREAM</span> <span class="text-muted">ALL YOU WANT</span></h1>
        </div>

        <div class="col-md-6">
            <div class="bd-example">
              <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                  <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{ asset('/img/products/home/1.png') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                     {{--  <h5>Live Streaming </h5> --}}
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('/img/products/home/2.png') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                     {{--    <h5>Services</h5>
                        <p>We have services that can ease every day needs.</p> --}}
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('/img/products/home/3.png') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
           {{--            <h5>Book Flights (Coming Soon)</h5>
                      <p>You can now book flights anytime soon</p> --}}
                    </div>
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
        </div>
    </div>


    <div class="imageThumbnail">
        <div class="row no-gutters">
            <div class="col-md-4 col-sm-4 col-12">
                <div class="imghome">
                    <a href="#"><img src="/img/shop/apparel.jpg" alt="apparel" class="image mg-fluid"></a>
                    <div class="middle">
                        <div class="text">SERVICES</div>
                        <h4 class="text-dark"><b>COMING SOON</b></h4>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4 col-12">
                <div class="imghome">
                    <a href="#"><img src="/img/shop/job.jpg" alt="apparel" class="image mg-fluid"></a>
                    <div class="middle">
                        <div class="text">JOB SEARCH</div>
                        <h4 class="text-dark"><b>COMING SOON</b></h4>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4 col-12">
                <div class="imghome">
                    <a href="#"><img src="/img/shop/book.jpg" alt="apparel" class="image mg-fluid"></a>
                    <div class="middle">
                        <div class="text">BOOKING</div>
                        <h4 class="text-dark"><b>COMING SOON</b></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="site-footer push">ONE BEEM 2019</footer>

@endsection