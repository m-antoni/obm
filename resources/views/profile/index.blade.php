@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center no-gutters">
    <div class="col-md-12">          
        <div class="row mt-2">
          <div class="col-md-3 col-12">
            <div class="list-group mb-4">
              <div class="list-group-item">
                  <div align="center">
                    @if(auth()->user()->image == null)
                        <img src="{{ asset('/img/noimage.jpg') }}" alt="img1" class="img-fluid my-3">
                    @else
                        <img src="{{ asset('/storage/' . auth()->user()->image) }}" style="border-radius: 100%; height: 150px; width: 150px;" class="my-3">
                    @endif
                    <div class="p-3">
                        <h5><b>{{auth()->user()->getFullNameAttribute()}}</b></h5>
                    </div>
                  </div>

                  <div class="float-center">
                      <a class="btn btn-link btn-block p-0" data-toggle="collapse" href="#updateImage" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><b>Update Image</b>
                      </a>
                  </div>
    
                  <div class="collapse multi-collapse mt-3"  id="updateImage">
                      <div class="row justify-content-center">
                          <div class="col-md-12 col-10">
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
                                      
                                      <button type="submit" class="btn btn-dark btn-block mt-4">
                                        <i class="fa fa-image"></i> 
                                          Submit
                                      </button> 
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>   {{-- end of image --}}
              </div>
            </div>
          </div>

          <div class="col-md-9 col-12">
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
                        <div class="col-md-12">
                            <div class="">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="info-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#history" role="tab">Balance</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                     {{-- Master Debit Card --}}
                                     @if(auth()->user()->card)
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
                                     @else
                                        <div class="imageThumbnail my-2">
                                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                                  Get Your One Beem Master Debit Card 
                                                  <strong><i class="fa fa-credit-card"></i> FOR FREE!</strong> 
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="imghome">
                                                <div class="middle">
                                                    <div class="text"></div>
                                                     {{-- <a href="{{ route('card.register') }}"><h4 class="text-dark"><b>CLICK HERE</b></a> --}}
                                                </div>
                                            </div>
                                        </div>
                                     @endif 
                                </div>

                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="alert alert-info mt-2">
                                        <h5><b>{{auth()->user()->getFullNameAttribute()}}</b></h5>
                                        <div>{{auth()->user()->phone}}</div>
                                        <div>{{auth()->user()->email}}</div>
                                        <div>{{auth()->user()->getFullAddressAttribute()}}</div>
                                    </div>

                                    {{-- Refer A Friend --}} 
                                    <div class="card">
                                        <div class="card-body row justify-content-center">
                                            <div class="col-md-4 col-12 mt-3">
                                                <a data-toggle="collapse" href="#formRefer" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
                                                  <button class="btn btn-outline-dark">
                                                      <i class="fa fa-user-circle"></i> REFER A FRIEND
                                                  </button>
                                                </a>
                                                <div class="my-2 text-danger">Get Additional <i class="fa fa-coins"></i> 50 BCS</div>

                                                <div class="collapse multi-collapse" id="formRefer">
                                                    <div class="card card-body mt-2">
                                                         <form action="{{route('referral.send')}}" method="POST">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label>Email Address</label>
                                                                <input id="email" name="email" class="form-control" placeholder="enter email">
                                                            </div>
                                                            
                                                            <div class="form-group mt-3">
                                                              <button type="submit" class="btn btn-outline-primary">
                                                                <i class="fa fa-chain"></i> Send Link
                                                              </button>
                                                           </div>
                                                         </form>  
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4 col-12 mt-3">
                                                <a data-toggle="collapse" href="#referrals" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"> 
                                                    <button class="btn btn-primary">
                                                        <i class="fa fa-users"></i> Referred Users
                                                    </button>
                                                </a>

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
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="history" role="tabpanel">
                                    <div class="alert alert-info mt-2">
                                        <h5><b>Total:</b> <i class="fa fa-coins"></i> {{ number_format(auth()->user()->credits) }} BCS</h5>
                                    </div>
                                    
                                    @if($status) 
                                        <div class="alert alert-danger">
                                            <h5><b>Pending Request</b></h5></p>
                                            <h5><i class="fa fa-coins"></i> {{ number_format($status->credits) }} BCS</h5>
                                        </div>
                                    @else
                                        <div class="alert alert-info alert-dismissible fade show mt-2" role="alert">
                                             <h5><b>Purchase Beem Credits</b></h5> <b><a href="{{ route('show.credits') }}"> Click Here</a></b>

                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                    @endif

                                    <div class="alert alert-info">
                                        <h5><b>One Beem Master Debit Card</b></h5>
                                        <h5>
                                          @if(auth()->user()->card)
                                            @if(auth()->user()->card->status == true)
                                                Status:<span class="text-dark"> Activated</span> 
                                                <h5>Account No. {{auth()->user()->card->account_number}}</h5>
                                            @else 
                                                Status: <span class="text-danger">Pending</span> 
                                            @endif
                                          @else
                                            <a href="{{ route('card.register') }}">Click here</a>
                                          @endif
                                        </h5> 
                                    </div>
                                </div>
                              </div>                    
                          </div> {{-- col-12 --}}
                      </div>{{-- col-md-8 --}}
                  </div>
              </div>
            </div>
          </div>  
        </div>
    </div>
  </div>
</div>

@endsection