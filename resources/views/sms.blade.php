@extends('layouts.app')

@section('content')

<div class="container customHeight">
		<div class="col-6">
				<form action="" method="POST">
					@csrf
					<div class="form-group">
							<label for="">Phone</label>
							<input type="text" name="phone" class="form-control">
					</div>
					<div class="form-group">
							<label for="">Mesage</label>
							<input type="text" name="message" class="form-control">
					</div>

					<input type="submit" class="btn btn-dark btn-block p-3" value="submit">
				</form>
		</div>
</div>


<script src="/js/slideout.min.js"></script>
@endsection

@section('script')

	    <script>
	      window.onload = function() {
	        document.querySelector('.js-slideout-toggle').addEventListener('click', function() {
	          slideout.toggle();
	        });

	        document.querySelector('.menu').addEventListener('click', function(eve) {
	          if (eve.target.nodeName === 'A') { slideout.close(); }
	        });

	        var runner = mocha.run();
	      };
    </script>
@endsection