
@if (session('adminError'))
	<div class="alert alert-danger">
		{{ session('adminError') }}
	</div>
@endif
<nav class="navbar navbar-expand-lg navbar-light shadow p-3 mb-5 bg-success rounded">
	<div class="container">
		<a class="navbar-brand" href="/">Uniques</a>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNav" aria-controls="myNav" aria-expanded="false" aria-label="Menu navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="myNav">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item"><a class="nav-link" href="/">Home</a></li>
				<li class="nav-item"><a class="nav-link" href="/products-list">Products</a></li>
				<li class="nav-item"><a class="nav-link" href="/faq">Frequent questions</a></li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="/" id="dropProducts" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Work products
					</a>
					<div class="dropdown-menu" aria-labelledby="dropProducts">
						<a class="dropdown-item" href="/products-list">Products</a>
						<div class="dropdown-divider"></div>
            {{-- si es un usuario logueado --}}
						@auth

							<a class="dropdown-item" href="/new-product">Create product</a>
							<a class="dropdown-item" href="/product-edit">Edit product</a>

						@endauth
					</div>
				</li>
			</ul>

			<form class="form-inline my-2 my-lg-0" action="" method="post">
				<input class="form-control mr-sm-2" name="search" aria-label="search" placeholder="search">
				<button class="btn btn-primary muted btn-sm my-sm-0" type="submit" name="search">Search</button>
			</form>

			<ul class="navbar-nav ml-auto d-flex align-items-center">
        {{-- si es un usuario invitado --}}
				@guest
					<li class="nav-item"><a class="nav-link" href="/register">Register</a></li>
					<li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
				@else
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="{{ route('profile') }}" id="dropNavBar" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<img class="img-fluid bg-success img-thumbnail" src="/storage/avatars/{{ Auth::user()->avatar }}" width="50" style="border-radius:30px;">
							Hello {{ Auth::user()->name }}
						</a>

						<div class="dropdown-menu" aria-labelledby="dropNavBar">
							<a class="dropdown-item mt-1" href="{{ route('profile') }}">My Profile</a>
							<a class="dropdown-item" href="{{ route('profile') }}">Edit profile</a>
							<div class="dropdown-divider"></div>
							<form class="mb-0" action="{{ route('logout') }}" method="post">
								@csrf
								<button class="dropdown-item" type="submit">Salir</button>
							</form>
						</div>
					</li>
				@endguest
			</ul>

		</div>
	</div>
</nav>

<script src="/js/app.js"></script>
<script src="/js/main.js"></script>
