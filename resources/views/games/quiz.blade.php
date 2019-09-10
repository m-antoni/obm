@extends('layouts.app')

@section('content')
				
<div class="container">

  <div class="row justify-content-center">

      <div class="col-lg-8">

          <div class="card mt-5">

              <div class="card-header">
                   Welcome to Quiz Game
              </div>

              <div class="card-body">

                  <div id="startingPage">    <!--  START  -->
                      <div class="row text-center">
                          <div class="col-lg-12">
                             
                              <button class="form-control btn btn-primary" id="btnStart">CLICK HERE TO START!</button>
                              <button class="form-control btn btn-primary" id="btnInstructions" style="margin-top: 10px;">INTRUCTIONS</button>
                          </div>
                      </div>
                  </div>


                  <div id="instructionPage" style="display: none;"> <!--  INSTRUCTIONS  -->
                      <div class="row">
                          <div class="col-lg-12">
                              <h4 class="text-center">GAME INTRUCTIONS</h4>
                              <p style="text-align: justify;">The quizzes consists of questions carefully designed to help you self-assess your comprehension of the information presented on the topics covered in the module. No data will be collected on the website regarding your responses or how many times you take the quiz.
                                  <br> Each question in the quiz is of multiple-choice or "true or false" format. Read each question carefully, and click on the button next to your response that is based on the information covered on the topic in the module. Each correct or incorrect response will result in appropriate feedback immediately at the bottom of the screen.
                                  <br> After responding to a question, click on the "Next Question" button at the bottom to go to the next questino. After responding to the 8th question, click on "Close" on the top of the window to exit the quiz.
                                  <br> If you select an incorrect response for a question, you can try again until you get the correct response. If you retake the quiz, the questions and their respective responses will be randomized.
                                  <br> The total score for the quiz is based on your responses to all questions. If you respond incorrectly to a question or retake a question again and get the correct response, your quiz score will reflect it appropriately. However, your quiz will not be graded, if you skip a question or exit before responding to all the questions.</p>
                              <button class="form-control btn btn-success" style="margin-top: 10px;" id="btnReturn">RETURN</button>
                          </div>
                      </div>
                  </div>


                  <div id="questionNumber1" style="display: none;"> <!--  Question Number 1  -->
                      <div class="row">
                          <div class="col-lg-12">
                              <h4 class="text-center">Question Number 1</h4>
                              <p style="text-align: center;">In which country Machu Picchu located ?</p>
                              <button class="btn btn-success form-control btnAnswer1" id="correct" style="text-align: left;">A. Peru</button>
                              <button class="btn btn-success form-control btnAnswer1" id="wrong" style="margin-top: 10px; text-align: left;">B. Spain</button>
                              <button class="btn btn-success form-control btnAnswer1" id="wrong" style="margin-top: 10px; text-align: left;">C. Brazil</button>
                              <button class="btn btn-success form-control btnAnswer1" id="wrong" style="margin-top: 10px; text-align: left;">D. U.S.A</button>
                          </div>
                      </div>
                  </div>



                  <div id="questionNumber2" style="display: none;"> <!--  Question Number 1  -->
                      <div class="row">
                          <div class="col-lg-12">
                              <h4 class="text-center">Question Number 2</h4>
                              <p style="text-align: center;">What is the name of a group of Porcupines ?</p>
                              <button class="btn btn-success form-control btnAnswer2" id="correct" style="text-align: left;">A. A Prickle</button>
                              <button class="btn btn-success form-control btnAnswer2" id="wrong" style="margin-top: 10px; text-align: left;">B. A Gang</button>
                              <button class="btn btn-success form-control btnAnswer2" id="wrong" style="margin-top: 10px; text-align: left;">C. A Troop</button>
                              <button class="btn btn-success form-control btnAnswer2" id="wrong" style="margin-top: 10px; text-align: left;">D. A Fraternity</button>
                          </div>
                      </div>
                  </div>

                  <div id="questionNumber3" style="display: none;"> <!--  Question Number 1  -->
                      <div class="row">
                          <div class="col-lg-12">
                              <h4 class="text-center">Question Number 3</h4>
                              <p style="text-align: center;">Which of the following is the lowest prime number ?</p>
                              <button class="btn btn-success form-control btnAnswer3" id="wrong" style="text-align: left;">A. 11</button>
                              <button class="btn btn-success form-control btnAnswer3" id="wrong" style="margin-top: 10px; text-align: left;">B. 12</button>
                              <button class="btn btn-success form-control btnAnswer3" id="correct" style="margin-top: 10px; text-align: left;">C. 7</button>
                              <button class="btn btn-success form-control btnAnswer3" id="wrong" style="margin-top: 10px; text-align: left;">D. 10</button>
                          </div>
                      </div>
                  </div>

                  <div id="questionNumber4" style="display: none;"> <!--  Question Number 1  -->
                      <div class="row">
                          <div class="col-lg-12">
                              <h4 class="text-center">Question Number 4</h4>
                              <p style="text-align: center;">What fictional planet is the character Superman from ?</p>
                              <button class="btn btn-success form-control btnAnswer4" id="wrong" style="text-align: left;">A. Mercury</button>
                              <button class="btn btn-success form-control btnAnswer4" id="correct" style="margin-top: 10px; text-align: left;">B. Krypton</button>
                              <button class="btn btn-success form-control btnAnswer4" id="wrong" style="margin-top: 10px; text-align: left;">C. Krytonia</button>
                              <button class="btn btn-success form-control btnAnswer4" id="wrong" style="margin-top: 10px; text-align: left;">D. Jupiter</button>
                          </div>
                      </div>
                  </div>

                   <div id="questionNumber5" style="display: none;"> <!--  Question Number 1  -->
                      <div class="row">
                          <div class="col-lg-12">
                              <h4 class="text-center">Question Number 5</h4>
                              <p style="text-align: center;">What does the 'A' stand for in NATO ?</p>
                              <button class="btn btn-success form-control btnAnswer5" id="correct" style="text-align: left;">A. Atlantic</button>
                              <button class="btn btn-success form-control btnAnswer5" id="wrong" style="margin-top: 10px; text-align: left;">B. American</button>
                              <button class="btn btn-success form-control btnAnswer5" id="wrong" style="margin-top: 10px; text-align: left;">C. Authority</button>
                              <button class="btn btn-success form-control btnAnswer5" id="wrong" style="margin-top: 10px; text-align: left;">D. Association</button>
                          </div>
                      </div>
                  </div>

                   <div id="result" style="display: none;"> <!--  Question Number 1  -->
                      <div class="row">
                          <div class="col-lg-12">
                              <h4 class="text-center">Congratulations!</h4>
                              <h5 class="text-center">You've got <br> <text id="score"> </text> out of 5 Questions</h5>
                              <h5 class="text-center" id="grade"></h5>
                              <button class="btn btn-success form-control" id="btnPlayagain">PLAY AGAIN ?</button>
                          </div>
                      </div>
                  </div>


              </div>

              <div class="card-footer text-center">
                  <small class="text-muted">Powered by OBM</small>
              </div>
          </div>

      </div>

  </div>
  <!-- /.row -->
</div>
						
@endsection

@section('script')

<script src="{{ asset('/js/sweetalert.min.js') }}"></script>

<script>
	   var correctAnswer = 0;

    $('#btnInstructions').click(function(){
            $('#startingPage').hide("slow");
            $('#instructionPage').show("fast");
    });

    $('#btnReturn').click(function(){
            $('#startingPage').show("slow");
            $('#instructionPage').hide("fast");
    });

    $('#btnStart').click(function(){
            $('#startingPage').hide("slow");
            $('#questionNumber1').show("fast");
    });

    $('.btnAnswer1').click(function(){ // Question # 1
        if(this.id == "correct"){
            swal({
                title:"Your answer was correct!",
                text:"Machu Pichu is located in the Machupicchu District in Peru. A 2007 internet poll rated it as one of the New Seven Wonders of the World.",
                icon:"success"
            })
            .then((value) => {
              correctAnswer+=1;
              $('#questionNumber1').hide("slow");
              $('#questionNumber2').show("fast");
              swal(`Your correct answer:` +correctAnswer);
            });
        }
        else{
            swal({
                title:"Your answer was wrong!",
                text:"The correct answer was letter 'A'. Machu Pichu is located in the Machupicchu District in Peru. A 2007 internet poll rated it as one of the New Seven Wonders of the World.",
                icon:"warning"
            })
            .then((value) => {
              $('#questionNumber1').hide("slow");
              $("#questionNumber2").show("fast");
              swal(`Your correct answer:` +correctAnswer);
            });   
        }
    });


     $('.btnAnswer2').click(function(){ // Question # 2
        if(this.id == "correct"){
            swal({
                title:"Your answer was correct!",
                text:"A group of porcupine was known as a Prickle.",
                icon:"success"
            })
            .then((value) => {
              correctAnswer+=1;
              $('#questionNumber2').hide("slow");
              $('#questionNumber3').show("fast");
              swal(`Your correct answer:` +correctAnswer);
            });
        }
        else{
            swal({
                title:"Your answer was wrong!",
                text:"The correct answer was letter 'A'. A group of porcupine was known as a Prickle.",
                icon:"warning"
            })
            .then((value) => {
              $('#questionNumber2').hide("slow");
              $("#questionNumber3").show("fast");
              swal(`Your correct answer:` +correctAnswer);
            });   
        }
    });


     $('.btnAnswer3').click(function(){ // Question # 2
        if(this.id == "correct"){
            swal({
                title:"Your answer was correct!",
                text:"A prime number is a number that is only divisible by one and itself. Hence 7 is the lowest Prime Number in this list.",
                icon:"success"
            })
            .then((value) => {
              correctAnswer+=1;
              $('#questionNumber3').hide("slow");
              $('#questionNumber4').show("fast");
              swal(`Your correct answer:` +correctAnswer);
            });
        }
        else{
            swal({
                title:"Your answer was wrong!",
                text:"The correct answer was letter 'C'. A prime number is a number that is only divisible by one and itself. Hence 7 is the lowest Prime Number in this list.",
                icon:"warning"
            })
            .then((value) => {
              $('#questionNumber3').hide("slow");
              $("#questionNumber4").show("fast");
              swal(`Your correct answer:` +correctAnswer);
            });   
        }
    });


    $('.btnAnswer4').click(function(){ // Question # 2
        if(this.id == "correct"){
            swal({
                title:"Your answer was correct!",
                text:"Krypton is the home planet of Superman. The planet exploded as a result of unstable geological conditions.",
                icon:"success"
            })
            .then((value) => {
              correctAnswer+=1;
              $('#questionNumber4').hide("slow");
              $('#questionNumber5').show("fast");
              swal(`Your correct answer:` +correctAnswer);
            });
        }
        else{
            swal({
                title:"Your answer was wrong!",
                text:"The correct answer was letter 'B'. Krypton is the home planet of Superman. The planet exploded as a result of unstable geological conditions.",
                icon:"warning"
            })
            .then((value) => {
              $('#questionNumber4').hide("slow");
              $("#questionNumber5").show("fast");
              swal(`Your correct answer:` +correctAnswer);
            });   
        }
    });


    $('.btnAnswer5').click(function(){ // Question # 2
        if(this.id == "correct"){
            swal({
                title:"Your answer was correct!",
                text:"NATO stand for Northern Atlantic Treaty Organisation. The organisation was formed in 1949.",
                icon:"success"
            })
            .then((value) => {
              correctAnswer+=1;
              $('#questionNumber5').hide("slow");
              $('#result').show("fast");
              defineGrade();
              document.getElementById("score").textContent = correctAnswer;
              swal(`Your correct answer:` +correctAnswer);
            });
        }
        else{
            swal({
                title:"Your answer was wrong!",
                text:"The correct answer was letter 'A'. NATO stand for Northern Atlantic Treaty Organisation. The organisation was formed in 1949.",
                icon:"warning"
            })
            .then((value) => {
              $('#questionNumber5').hide("slow");
              $('#result').show("fast");
              defineGrade();
              document.getElementById("score").textContent = correctAnswer;
              swal(`Your correct answer:` +correctAnswer);
            });   
        }
    });

    function defineGrade(){

	        if(correctAnswer == 5){

	            document.getElementById("grade").textContent = "Excellent!";
	        
	        }
	        else if(correctAnswer == 4){

	            document.getElementById("grade").textContent = "Very Good!";
	        
	        }
	        else if(correctAnswer == 3){

	            document.getElementById("grade").textContent = "Good!";
	        
	        }
	        else if(correctAnswer == 2){

	            document.getElementById("grade").textContent = "Poor!";
	        
	        }
	        else if(correctAnswer == 2){

	            document.getElementById("grade").textContent = "Very Bad!";
	        
	        }
	        else{
	            document.getElementById("grade").textContent = "Keep it Up!";
	            
	        }
    }

		$('#btnPlayagain').click(function(){

		$('#result').hide("slow");
		$('#startingPage').show("fast");


		});
</script>
@endsection