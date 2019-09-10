@extends('layouts.app')

@section('content')
<div class="py-5 mb-4" style="background: #383c4a">
    <h2 align="center" class="text-white"><i class="fa fa-file text-white"></i> E-Books</h2>
</div>

<div class="container">
		<div class="row justify-content-center">
				<div class="col-md-4 col-6">
						<div class="card">
								<div class="card-body">
										<img src="{{ asset('/books/3.jpg')}}" alt="1"class="img-fluid">
								</div>
								<div class="card-footer">
										{{-- 	<button class="bttn bttn-fill bttn-warning bttn-sm" data-toggle="modal" data-target="#book">Synopsis</button> --}}
											<a href="{{ route('pinoy') }}" class="btn btn-primary">Read Now</a>
											{{-- <button class="bttn-material-circle bttn-sm bttn-danger"><i class="fa fa-heart"></i> </button> --}}
								</div>
						</div>
				</div>
				<div class="col-md-4 col-6">
						<div class="card">
								<div class="card-body">
										<img src="{{ asset('/books/5.jpg')}}" alt="1"class="img-fluid">
								</div>
								<div class="card-footer">
											{{-- <button class="bttn bttn-fill bttn-warning bttn-sm" data-toggle="modal" data-target="#book">Synopsis</button> --}}
											<a href="{{ route('pinoy') }}" class="btn btn-primary">Read Now</a>
											{{-- <button class="bttn-material-circle bttn-sm bttn-danger"><i class="fa fa-heart"></i> </button> --}}
								</div>
						</div>
				</div>
				<div class="col-md-4 col-6">
						<div class="card">
								<div class="card-body">
										<img src="{{ asset('/books/1.jpg')}}" alt="1"class="img-fluid">
								</div>
								<div class="card-footer">
											{{-- <button class="bttn bttn-fill bttn-warning bttn-sm" data-toggle="modal" data-target="#book">Synopsis</button> --}}
										<a href="{{ route('pinoy') }}" class="btn btn-primary">Read Now</a>
											{{-- <button class="bttn-material-circle bttn-sm bttn-danger"><i class="fa fa-heart"></i> </button> --}}
								</div>
						</div>
				</div>
				<div class="col-md-4 col-6">
						<div class="card">
								<div class="card-body">
										<img src="{{ asset('/books/2.jpg')}}" alt="1"class="img-fluid">
								</div>
								<div class="card-footer">
										{{-- 	<button class="bttn bttn-fill bttn-warning bttn-sm" data-toggle="modal" data-target="#book">Synopsis</button> --}}
											<a href="{{ route('pinoy') }}" class="btn btn-primary">Read Now</a>
											{{-- <button class="bttn-material-circle bttn-sm bttn-danger"><i class="fa fa-heart"></i> </button> --}}
								</div>
						</div>
				</div>

				<div class="col-md-4 col-6">
						<div class="card">
								<div class="card-body">
										<img src="{{ asset('/books/4.jpg')}}" alt="1"class="img-fluid">
								</div>
								<div class="card-footer">
										{{-- 	<button class="bttn bttn-fill bttn-warning bttn-sm" data-toggle="modal" data-target="#book">Synopsis</button> --}}
											<a href="{{ route('pinoy') }}" class="btn btn-primary">Read Now</a>
										{{-- 	<button class="bttn-material-circle bttn-sm bttn-danger"><i class="fa fa-heart"></i> </button> --}}
								</div>
						</div>
				</div>

				<div class="col-md-4 col-6">
						<div class="card">
								<div class="card-body">
										<img src="{{ asset('/books/6.jpg')}}" alt="1"class="img-fluid">
								</div>
								<div class="card-footer">
											{{-- <button class="bttn bttn-fill bttn-warning bttn-sm" data-toggle="modal" data-target="#book">Synopsis</button> --}}
											<a href="{{ route('pinoy') }}" class="btn btn-primary">Read Now</a>
											{{-- <button class="bttn-material-circle bttn-sm bttn-danger"><i class="fa fa-heart"></i> </button> --}}
								</div>
						</div>
				</div>
		</div>
</div>


<div class="modal fade" id="book" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Synopsis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                 	<div><b>Date Release:</b>  2019-10-02</div>
                 	<div><b>Title:</b> Lorem Ipsum</div>
                 	<div><b>Author:</b>  Author Name</div>
                 	<p class="text-justify">
                 		<b>About: </b>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, praesentium quaerat, voluptates quis nesciunt ea, maxime non quod numquam reprehenderit tempore aliquam laboriosam 
                 		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, praesentium quaerat, voluptates quis nesciunt ea, maxime non quod numquam reprehenderit tempore aliquam laboriosamimpedit dolore? Expedita voluptates, animi ullam voluptas!
                 		maxime non quod numquam reprehenderit tempore aliquam laboriosam 
                 		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, praesentium quaerat, voluptates quis nesciunt ea, maxime non quod numquam reprehenderit tempore aliquam laboriosamimpedit
                 	</p>
              </div>
        </div>
    </div>
</div>


@endsection