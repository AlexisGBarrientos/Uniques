@extends('template')

@section('pageTitle', 'Products')

@section('mainContent')
	<!-- Products -->
	<div class="container" style="margin-top:30px; margin-bottom: 30px;">
		<div class="row">
			<!-- Los productos -->
			@foreach ($products as $oneProduct)
				<div class="col-md-6 col-lg-4">

						<div class="card mt-3">
							<img src="/storage/{{ $oneProduct['image'] }}" class="card-img-top img-fluid my-3" alt="product image">
							<div class="card-body">
								<h4 class="card-title">{{ $oneProduct['name'] }}</h4>
								<p class="card-text"> {{ $oneProduct['brand_name'] }} </p>
								<p class="card-text"> {{ $oneProduct['category_name'] }} </p>
								<p class="card-text text-justify"> {{ substr($oneProduct['description'], 0, 145) }}... </p>

								<a href="/detail/{{ $oneProduct['id'] }}" class="btn btn-success">See more</a>
							</div>
						</div>


				</div>
			@endforeach
			<!-- Los productos -->
			</div>
		</div>
	</div>
	<!-- //Products -->
@endsection
