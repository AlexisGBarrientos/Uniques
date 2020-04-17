@if (session('adminError'))
	<div class="alert alert-danger">
		{{ session('adminError') }}
	</div>
@endif

@extends('template')


@section('pageTitle', 'Details')


@section('mainContent')

		<div class="container justify-content-center">
			<section class="container col-6">
				<div class="row mt-3">
						<div class="card mt-3">
							<img class="card-img-top img-fluid mt-3" alt="Responsive image" src="/storage/{{$product->image}}">
							<div class="card-body">
								<h3 class="card-title">{{$product->name}}</h3>
			            <p class="card-text">{{$product->description}}</p>
			              <p class="card-subtitle">DESCRIPTION:</p>
			              <ul class="card-text mt-2">
			                <li><i>Brand: {{$brand_name}}.</i></li>
			                <li><i>Category: {{$category_name}}.</i></li>
											<li><i>Color: {{$color_name}} .</i></li>
			                <li><i>Price: {{$product->price}} $.</i></li>
			              </ul>

										@auth
										@if (Auth::user()->isAdmin())
											<div class="row" >
												<div class="col">
													<form action="/delete-product/{{ $product->id }}" method="post">
													 @csrf
													 <button type="submit" class="btn btn-block btn-danger btn-lg" name="button">Delete</button>
													</form>
														<a class="btn btn-block btn-lg btn-warning" href="/product-edit/{{$product->id}}/edit">Edit</a>
												</div>

											</div>
										@endif
										@endauth
							</div>


						</div>
				</div>



			</section>
		</div>

@endsection
