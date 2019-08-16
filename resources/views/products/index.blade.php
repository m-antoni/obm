@extends('layouts.app')

@section('content')

<div class="container customHeight">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div align="center">
                <a href="{{route('appliances')}}">
                    <button class="bttn bttn-lg bttn-danger bttn-fill py-2 bttn-primary m-1">
                        <i class="fa fa-tv"></i> APPLIANCES
                    </button>
                </a>
            </div>
        </div>
        
        <div class="col-md-6">
            <div align="center">
                <a href="{{route('kitchenware')}}">
                    <button class="bttn bttn-lg bttn-danger bttn-fill py-2 bttn-primary m-1">
                        <i class="fa fa-mug-hot"></i> KITCHENWARE
                    </button>
                </a>    
            </div>
        </div>

        <div class="col-md-6">
            <div align="center">
                <a href="#">
                    <button class="bttn bttn-lg bttn-danger bttn-fill py-2 bttn-primary m-1">
                        <i class="fa fa-bolt"></i> ELECTRONIC
                    </button>
                </a>
            </div>
        </div>

        <div class="col-md-6">
            <div align="center">
                <a href="#">
                    <button class="bttn bttn-lg bttn-danger bttn-fill py-2 bttn-primary m-1">
                        <i class="fa fa-mobile"></i> GADGETS
                    </button>
                </a>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <a href="#">
            <button class="bttn bttn-lg bttn-primary bttn-fill py-2 bttn-primary m-1">
                <i class="fa fa-coins"></i> TAP YOUR CREDITS
            </button>
        </a>
    </div>
</div>

<!-- Footer -->
{{-- <section class="bg-black small text-center text-white-50 py-5">
  <div class="container">
    <h6>Copyright &copy; ONE BEEM 2019</h6>
  </div>
</section> --}}

@endsection


@section('script')
    @if(session('success'))
        <script type="text/javascript">
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
@endsection