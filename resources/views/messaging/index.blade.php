@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-around">
		<div class="col-md-6">
			<div class="card mt-3">
				<div class="card-header"><h4>Chatbox</h4></div>
				<div id="displayChat" class="card-body" style="overflow-y: auto; height: 400px;">		
				</div>
				<div class="card-footer">
				<form>
					<div class="input-group mb-3">
					  <input type="text"   id="txtMessage" class="form-control" placeholder="Enter message.">
					  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
					  <div class="input-group-append">
					    <button id="sendMessage" class="btn btn-outline-primary" type="button" id="button-addon2"> <i class=" fa fa-send"></i> Send </button>
					  </div>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection


@section('script')
<script>
	var csrf = $('#token').val();

	$(document).ready(function(){
		  // $('#displayChat').animate({scrollTop: '1000'}, 800);  
		  $('#displayChat').animate({
        scrollTop: $('#displayChat')[0].scrollHeight}, 2000);
	});
 

	setInterval(function(){
   		load_last_message();
   		// load_last_csr();
  }, 2000);

	function load_last_message(){
    $.ajax({
		    url:"{{ route('fetchMessage')}}",
		    method:"GET",
		    // data:{chat_box_id:CID},
		    success:function(data){
		    	var result;
					var image = '{{ asset('/storage/' . auth()->user()->image ) }}';
		    	var logo = '{{ asset('/img/logocircle.png') }}';

					$.each(data, function( index, value ) {
						if(value.csr_id != 0){

							result += '<div class="chat bg-dark">';
							result += '<img src='+ logo +' alt="Avatar">';
						  result += '<p class="message text-white">' + value.message + '</p>';
						  result += '<span class="time-left">' + new Date(value.created_at).toLocaleTimeString() + '</span>';
						  result += '</div>';

						}else{

							result += '<div class="chat darker">';
							result += '<img src='+ image +' alt="Avatar" class="right" style="border-radius: 100%; height: 60px; width: 60px;">';
						  result += '<p class="message">' + value.message + '</p>';
						  result += '<span class="time-left">' + new Date(value.created_at).toLocaleTimeString() + '</span>';
						  result += '</div>';
						}
							
					});

					$("#displayChat").html(result);
		    }
 	  });
  }



  $('#txtMessage').on("keypress", function(e){
    if(e.keyCode == 13){
	      var chat_box_id = '{{auth()->user()->chatbox->id }}';
		  	var txtMessage = document.getElementById("txtMessage");
		  	var Message = $('#txtMessage').val();

		  	$.ajax({
			    url:'{{ route('sendMessage') }}',
			    method:'POST',
			    data:{message:message, chat_box_id:chat_box_id , user_id:user_id, _token: csrf},
			  	success: function(data){
	          	console.log(data);
	          	$('#txtMessage').val('');
        },
		        error: function(data) {
		            alert('SOMETHING WENT WRONG');
		        },
		  	});

	    }
	});

  $('#sendMessage').click(function(){
  	var chat_box_id = '{{auth()->user()->chatbox->id }}';
  	var user_id = '{{auth()->user()->id}}';
  	var txtMessage = document.getElementById("txtMessage");
  	var message = $('#txtMessage').val();

  	$.ajax({
		    url:'{{ route('sendMessage') }}',
		    method:'POST',
		    data:{message:message, chat_box_id:chat_box_id, user_id:user_id, _token: csrf},
		    success: function(data) {
          	console.log(data);
          	$('#txtMessage').val('');
        },
        error: function(data) {
            alert('SOMETHING WENT WRONG');
        },
  	});

  });
</script>
@endsection
