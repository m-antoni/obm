@extends('layouts.app')

@section('content')
	<div class="container">
			<div class="row">
					<div class="col-md-6">
							<!-- Play.iDevGames.co.uk Responsive Embed Code for Trap Survival Ultimate Classic Hunt -->
							<script>
							window.onload = function() {
							    var thegamelink = "https://play.idevgames.co.uk/embed/trap-survival-ultimate-classic-hunt";
							    var ref = document.referrer;
							    var theurl = document.referrer;
							    ref = ref.substring(ref.indexOf("://") + 3)
							    ref = ref.split("/")[0];
							    if(ref == "my-ga.me"){
							        theurl = "true"
							    } else {
							        theurl = "false"
							    } 
							    document.getElementById("embededGame").src = thegamelink+"/"+theurl;
							}
							</script>
							<div style="position: relative;height: 0;overflow: hidden;padding-bottom: 56.25%;">
							    <iframe id="embededGame" src="https://play.idevgames.co.uk/embed/trap-survival-ultimate-classic-hunt" width="840px" height="480px" 
							    scrolling="no" seamless="seamless" frameBorder="0" style="position: absolute;top:0;left: 0;width: 100%;height: 100%;">Browser not compatible.</iframe>
							</div>
							<!-- End Embed Code -->
					</div>
			</div>
	</div>
@endsection