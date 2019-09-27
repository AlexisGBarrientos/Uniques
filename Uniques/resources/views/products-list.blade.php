@extends('template')

@section('pageTitle', 'Products')

@section('mainContent')
	<!-- Products -->
	<div class="container" style="margin-top:30px; margin-bottom: 30px;">
		<div class="row">
			<!-- Los productos -->
			@foreach ($products as $oneProduct)
				<div class="col-md-6 col-lg-4">
					<div class="card" style="margin-bottom: 30px">
						<img src="/images/{{ $oneProduct['image'] }}" class="card-img-top" alt="imagen del producto">
						<div class="card-body">
							<h4 class="card-title">{{ $oneProduct['name'] }}</h4>
							<p class="card-text">{{ substr($oneProduct['description'], 0, 145) }}...</p>

							<a href="/products/{{ $oneProduct['id'] }}" class="btn btn-success">See Detail</a>
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
