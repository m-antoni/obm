
@extends('layouts.app')

@section('content')




<section class="pricing py-5">
  <div class="container" id="homepage">
  	<div class="row justify-content-center no-gutters mb-5 mb-lg-0">
		  <div class="col-lg-6">
		    <img class="img-fluid" src="img/headerTwo.jpg" alt="">
		  </div>
		  <div class="col-lg-6">
		    <div class="bg-black text-center h-100 project">
		      <div class="d-flex h-100">
		        <div class="project-text w-100 my-auto text-center text-lg-left p-5">
		          <h4 class="text-white">Introducing <span class="text-primary">BEEM BUCKS</span></h4>
		          <p class="mb-0 text-white-50">
		          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio reprehenderit, molestias. Possimus autem, qui architecto suscipit. Laborum, omnis quibusdam. Nemo facilis optio dolore hic animi fugiat voluptatibus illo perspiciatis eum..
		        	</p>
		          <hr class="d-none d-lg-block mb-0 ml-0">
		        </div>
		      </div>
		    </div>
		  </div>
		</div>

		<h1 align="center" class="mt-5"><i class="fa fa-coins"></i> BEEM BUCKS</h1>
		<h4 align="center" class="text-secondary">Php 45.00 for 1 BBS</h4>
    <div class="row mt-5">
      <!-- Free Tier -->
      <div class="col-lg-4">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <h1 class="card-title text-muted text-uppercase text-center">200 <i class="fa fa-coins"></i></h1>
            <h4 class="card-price text-center"><span class="period"> BEEM BUCKS</span></h4>
            <hr>
       {{--      <ul class="fa-ul">
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Single User</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>5GB Storage</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Public Projects</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access</li>
              <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Unlimited Private Projects</li>
              <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Dedicated Phone Support</li>
              <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Free Subdomain</li>
              <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Monthly Status Reports</li>
            </ul> --}}
            <a href="#">
	            <button class="btn btn--m btn-outline-primary btn-lg p-3 btn-block">
	               PURCHASE
	            </button>
            </a> 
          </div>
        </div>
      </div>
      <!-- Plus Tier -->
      <div class="col-lg-4">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <h1 class="card-title text-muted text-uppercase text-center">500 <i class="fa fa-coins"></i></h1>
            <h4 class="card-price text-center"><span class="period"> BEEM BUCKS</span></h4>
            <hr>
       {{--      <ul class="fa-ul">
              <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>5 Users</strong></li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>50GB Storage</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Public Projects</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Private Projects</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Dedicated Phone Support</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Free Subdomain</li>
              <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Monthly Status Reports</li>
            </ul> --}}
	            <a href="#">
		            <button class="btn btn--m btn-outline-primary btn-lg p-3 btn-block">
		               PURCHASE
		            </button>
	            </a> 
          </div>
        </div>
      </div>
      <!-- Pro Tier -->
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">
            <h1 class="card-title text-muted text-uppercase text-center">1000 <i class="fa fa-coins"></i></h1>
            <h4 class="card-price text-center"><span class="period"> BEEM BUCKS</span></h4>
            <hr>
 {{--            <ul class="fa-ul">
              <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Unlimited Users</strong></li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>150GB Storage</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Public Projects</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Private Projects</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Dedicated Phone Support</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Unlimited</strong> Free Subdomains</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Monthly Status Reports</li>
            </ul> --}}
             	<a href="#">
		            <button class="btn btn--m btn-outline-primary btn-lg p-3 btn-block">
		               PURCHASE
		            </button>
	            </a> 
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



  <!-- Footer -->
  <footer class="bg-black small text-center text-white-50">
    <div class="container">
      <h5>Copyright &copy; ONE BEEM 2019</h5>
    </div>
  </footer>

@endsection


