@extends('layouts.app')

@section('content')

<div class="imageThumbnail" style="margin-top: 70px;">
    <div class="row no-gutters justify-content-center">
        <div class="col-md-3 col-sm-4 col-12">
            <div class="imghome">
                <img src="{{ asset('/img/bills/credits.jpg') }}" alt="apparel" class="image mg-fluid">
                <div class="middle">
                    <h4 class="text-muted">Credit Cards/Loans</h4>
                    <h4 class="text-dark">
                    	<a href="{{ route('creditcard.loans') }}">
                    			<button class="bttn bttn-fill bttn-sm bttn-danger">
                    				</b>CLICK HERE</b>
                    			</button>
                    	</a>
                    </h4>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-4 col-12">
            <div class="imghome">
                <img src="{{ asset('/img/bills/insurance.jpg') }}" alt="apparel" class="image mg-fluid">
                <div class="middle">
                    <h4 class="text-muted">Insurance</h4>
                    <h4 class="text-dark">
                    	<a href="{{ route('insurance') }}">
                    			<button class="bttn bttn-fill bttn-sm bttn-danger">
                    				</b>CLICK HERE</b>
                    			</button>
                    	</a>
                    </h4>
                </div>
            </div>
        </div>
				
		<div class="col-md-3 col-sm-4 col-12">
            <div class="imghome">
                <img src="{{ asset('/img/bills/utility.jpg') }}" alt="apparel" class="image mg-fluid">
                <div class="middle">
                    <h4 class="text-muted">Utility</h4>
                    <h4 class="text-dark">
                    	<a href="{{ route('utility') }}">
                    			<button class="bttn bttn-fill bttn-sm bttn-danger">
                    				</b>CLICK HERE</b>
                    			</button>
                    	</a>
                    </h4>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-4 col-12">
            <div class="imghome">
                <img src="{{ asset('/img/bills/telco.jpg') }}" alt="apparel" class="image mg-fluid">
                <div class="middle">
                    <h4 class="text-muted">Telecommunications</h4>
                    <h4 class="text-dark">
                    	<a href="{{ route('telco') }}">
                    			<button class="bttn bttn-fill bttn-sm bttn-danger">
                    				</b>CLICK HERE</b>
                    			</button>
                    	</a>
                    </h4>
                </div>
            </div>
        </div>
				
				<div class="col-md-4 col-sm-4 col-12">
            <div class="imghome">
                <img src="{{ asset('/img/bills/cable.jpg') }}" alt="apparel" class="image mg-fluid">
                <div class="middle">
                    <h4 class="text-muted">Cable / Internet</h4>
                    <h4 class="text-dark">
                    	<a href="{{ route('cable') }}">
                    			<button class="bttn bttn-fill bttn-sm bttn-danger">
                    				</b>CLICK HERE</b>
                    			</button>
                    	</a>
                    </h4>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-4 col-12">
            <div class="imghome">
                <img src="{{ asset('/img/bills/government.jpg') }}" alt="apparel" class="image mg-fluid">
                <div class="middle">
                    <h4 class="text-muted">Government Payments</h4>
                    <h4 class="text-dark">
                    	<a href="{{ route('government') }}">
                    			<button class="bttn bttn-fill bttn-sm bttn-danger">
                    				</b>CLICK HERE</b>
                    			</button>
                    	</a>
                    </h4>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-4 col-12">
            <div class="imghome">
                <img src="{{ asset('/img/bills/others.jpg') }}" alt="apparel" class="image mg-fluid">
                <div class="middle">
                    <h4 class="text-muted">OTHERS</h4>
                    <h4 class="text-dark">
                    	<a href="{{ route('others') }}">
                    			<button class="bttn bttn-fill bttn-sm bttn-danger">
                    				</b>CLICK HERE</b>
                    			</button>
                    	</a>
                    </h4>
                </div>
            </div>
        </div>
		</div>
    </div>
</div>

@endsection

