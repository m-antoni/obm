@extends('layouts.app')

@section('style')
  	<style type="text/css">

  		body {
  			padding: 0;
  			background: #ddd;
  			font-family: Arial, Helvetica, sans-serif;
  		}

  		.title {
  			width: 100%;
  			max-width: 854px;
  			margin: 0 auto;
  		}

  		.caption {
  			width: 100%;
  			max-width: 854px;
  			margin: 0 auto;
  			padding: 20px 0;
  		}

  		.container {
  			width: 100%;
  			max-width: 854px;
  			min-width: 440px;
  			background: #fff;
  			margin: 0 auto;
  		}


  		/*  VIDEO PLAYER CONTAINER
 		############################### */
  		.vid-container {
		    position: relative;
		    padding-bottom: 52%;
		    padding-top: 30px; 
		    height: 0; 
		}
		 
		.vid-container iframe,
		.vid-container object,
		.vid-container embed {
		    position: absolute;
		    top: 45;
		    left: 0;
		    width: 100%;
		    height: 100%;
		}


		/*  VIDEOS PLAYLIST 
 		############################### */
		.vid-list-container {
			width: 92%;
			overflow: hidden;
			margin-top: 20px;
			margin-left:4%;
			padding-bottom: 20px;
		}

		.vid-list {
			width: 1344px;
			position: relative;
			top:0;
			left: 0;
		}

		.vid-item {
			display: block;
			width: 148px;
			height: 148px;
			float: left;
			margin: 0;
			padding: 10px;
		}

		.thumb {
			/*position: relative;*/
			overflow:hidden;
			height: 84px;
		}

		.thumb img {
			width: 100%;
			position: relative;
			top: -13px;
		}

		.vid-item .desc {
			color: #21A1D2;
			font-size: 15px;
			margin-top:5px;
		}

		.vid-item:hover {
			background: #eee;
			cursor: pointer;
		}

		.arrows {
			position:relative;
			width: 100%;
		}

		.arrow-left {
			color: #fff;
			position: absolute;
			background: #777;
			padding: 15px;
			left: -25px;
			top: -150px;
			z-index: 99;
			cursor: pointer;
		}

		.arrow-right {
			color: #fff;
			position: absolute;
			background: #777;
			padding: 15px;
			right: -25px;
			top: -150px;
			z-index:100;
			cursor: pointer;
		}

		.arrow-left:hover {
			background: #CC181E;
		}

		.arrow-right:hover {
			background: #CC181E;
		}


		@media (max-width: 624px) {
			.caption {
				margin-top: 40px;
			}
			.vid-list-container {
				padding-bottom: 20px;
			}

			/* reposition left/right arrows */
			.arrows {
				position:relative;
				margin: 0 auto;
				width:96px;
			}
			.arrow-left {
				left: 0;
				top: -50px;
			}

			.arrow-right {
				right: 0;
				top: -50px;
			}
		}

  	</style>	
@endsection

@section('content')
	<div class="container">

  		<!-- THE YOUTUBE PLAYER -->
  		<div class="vid-container">
		    <iframe id="vid_frame" src="https://www.youtube.com/embed/Do6mCfAVBeE?rel=0&amp;showinfo=0&amp;autohide=1" frameborder="0" width="560" height="315"></iframe>
		</div>

		<!-- THE PLAYLIST -->
		<div class="vid-list-container">
	        <div class="vid-list">
	         	
 	            <div class="vid-item" onClick="document.getElementById('vid_frame').src='https://www.youtube.com/embed/Do6mCfAVBeE?autoplay=1&amp;rel=0&amp;showinfo=0&amp;autohide=1'">
 	              <div class="thumb"><img src="/img/wish.jpg"></div>
 	              <div class="desc">Rocksteddy performs "Leslie" LIVE on Wish 107.5 Bus</div>
 	            </div>
 	          
 	            <div class="vid-item" onClick="document.getElementById('vid_frame').src='https://www.youtube.com/embed/ylCj0rj7_FQ?autoplay=1&amp;rel=0&amp;showinfo=0&amp;autohide=1'">
 	              <div class="thumb"><img src="/img/wish.jpg"></div>
 	              <div class="desc">Mojofly performs "Tumatakbo" LIVE on Wish 107.5 Bus</div>
 	            </div>

 	            <div class="vid-item" onClick="document.getElementById('vid_frame').src='https://www.youtube.com/embed/tfrAM8S1FyE?autoplay=1&amp;rel=0&amp;showinfo=0&amp;autohide=1'">
 	              <div class="thumb"><img src="/img/wish.jpg"></div>
 	              <div class="desc">Mojofly performs "Mata" LIVE on Wish 107.5 Bus</div>
 	            </div>

 	            <div class="vid-item" onClick="document.getElementById('vid_frame').src='https://www.youtube.com/embed/Hy52NiJ1Dsc?autoplay=1&amp;rel=0&amp;showinfo=0&amp;autohide=1'">
 	              <div class="thumb"><img src="/img/wish.jpg"></div>
 	              <div class="desc">Moonstar88 performs "Sulat" LIVE on Wish 107.5 Bus</div>
 	            </div>

 	            <div class="vid-item" onClick="document.getElementById('vid_frame').src='https://www.youtube.com/embed/cejGiXbxhZw?autoplay=1&amp;rel=0&amp;showinfo=0&amp;autohide=1'">
 	              <div class="thumb"><img src="/img/wish.jpg"></div>
 	              <div class="desc">Moonstar88 performs "Torete" LIVE on Wish 107.5 Bus</div>
 	            </div>

 	            <div class="vid-item" onClick="document.getElementById('vid_frame').src='https://www.youtube.com/embed/Y4m0Qhrak5M?autoplay=1&amp;rel=0&amp;showinfo=0&amp;autohide=1'">
 	              <div class="thumb"><img src="/img/wish.jpg"></div>
 	              <div class="desc">Moira and Jason perform "Ikaw At Ako" LIVE on Wish 107.5</div>
 	            </div>
 	          
 	            <div class="vid-item" onClick="document.getElementById('vid_frame').src='https://www.youtube.com/embed/1P1cEEp2KpU?autoplay=1&amp;rel=0&amp;showinfo=0&amp;autohide=1'">
 	              <div class="thumb"><img src="/img/wish.jpg"></div>
 	              <div class="desc">IV of Spades performs "Mundo" LIVE on Wish 107.5</div>
 	            </div>

 	            <div class="vid-item" onClick="document.getElementById('vid_frame').src='https://www.youtube.com/embed/adJKvjES8Ic?list=RD1P1cEEp2KpU?autoplay=1&amp;rel=0&amp;showinfo=0&amp;autohide=1'">
 	              <div class="thumb"><img src="/img/wish.jpg"></div>
 	              <div class="desc">Stephen Speaks performs "Passenger Seat" LIVE on Wish 107.5 Bus</div>
 	            </div>

	 	    </div>
        </div>

        <!-- LEFT AND RIGHT ARROWS -->
        <div class="arrows">
        	<div class="arrow-left"><i class="fa fa-chevron-left fa-lg"></i></div>
        	<div class="arrow-right"><i class="fa fa-chevron-right fa-lg"></i></div>
        </div>

  	</div>

@endsection

@section('script')
	<script type="text/javascript">
  		$(document).ready(function () {
		    $(".arrow-right").bind("click", function (event) {
		        event.preventDefault();
		        $(".vid-list-container").stop().animate({
		            scrollLeft: "+=336"
		        }, 750);
		    });
		    $(".arrow-left").bind("click", function (event) {
		        event.preventDefault();
		        $(".vid-list-container").stop().animate({
		            scrollLeft: "-=336"
		        }, 750);
		    });
		});
  	</script>

  	<!-- google analytics -->
  	<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-19095819-1']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

	</script>
@endsection