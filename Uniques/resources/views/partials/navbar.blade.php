
@if (session('adminError'))
	<div class="alert alert-danger">
		{{ session('adminError') }}
	</div>
@endif
<nav class="navbar navbar-expand-lg navbar-dark shadow p-3 mb-5 rounded ">
	<div class="container">
		<a class="navbar-brand" href="/">Uniques</a>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNav" aria-controls="myNav" aria-expanded="false" aria-label="Menu navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="myNav">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item"><a class="nav-link text-warning" href="/">Home</a></li>
				<li class="nav-item"><a class="nav-link text-warning" href="/products-list">Products</a></li>
				<li class="nav-item"><a class="nav-link text-warning" href="/faq">Frequent questions</a></li>

				@auth
				@if (Auth::user()->isAdmin() )
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-warning" href="/" id="dropProducts" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Work products
					</a>
					<div class="dropdown-menu mt-3" aria-labelledby="dropProducts" style="background-color: rgba(0, 0, 0, 0.72);">
						<a class="dropdown-item text-warning" href="/products-list">Products</a>
						<div class="dropdown-divider"></div>

							<a class="dropdown-item text-warning" href="/new-product">Create product</a>
							<a class="dropdown-item text-warning" href="/product-edit">Edit product</a>

					</div>
				</li>
				@endif
				@endauth
			</ul>


			<ul class="navbar-nav ml-auto">
				<form class="form-inline my-2 my-lg-0 " action="/search" method="GET">
					<input class="form-control mr-sm-2" name="search" aria-label="search" placeholder="search">
					<button class="btn btn-warning btn-sm my-sm-0" type="submit" name="">Search</button>
				</form>
			</ul>

			<ul class="navbar-nav ml-auto d-flex align-items-center">
        {{-- si es un usuario invitado --}}
				@guest
					<li class="nav-item"><a class="nav-link text-warning" href="/register">Register</a></li>
					<li class="nav-item"><a class="nav-link text-warning" href="/login">Login</a></li>
				@else
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle text-warning" href="{{ route('profile') }}" id="dropNavBar" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<img class="img-fluid rounded-circle bg-dark border-0 img-thumbnail" src="/storage/avatars/{{ Auth::user()->avatar }}" width="50">
							Hello {{ Auth::user()->name }}
						</a>

						<div class="dropdown-menu ml-2 mt-2" aria-labelledby="dropNavBar" style="background-color: rgba(0, 0, 0, 0.72);">
							<a class="dropdown-item text-warning" href="{{ route('profile') }}">My Profile</a>
							<a class="dropdown-item text-warning" href="/user-edit/{{ Auth::user()->id}}/edit">Edit profile</a>
							<div class="dropdown-divider"></div>
							<form class="mb-0" action="{{ route('logout') }}" method="post">
								@csrf
								<button class="dropdown-item text-warning" type="submit">Salir</button>
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
