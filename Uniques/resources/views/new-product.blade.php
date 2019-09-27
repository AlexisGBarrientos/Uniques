@extends('template')


@section('pageTitle', 'Create Product')

@section('mainContent')
	<!-- Listado de peliculas -->

	<div class="container" style="margin-top:30px; margin-bottom: 30px;">
		<h2>Create Product</h2>

		<form action="/new-product" method="post" enctype="multipart/form-data">
			{{-- Genera un input de tipo hidden con el token --}}
			@csrf

			<div class="row">

				<div class="col-6">
					<div class="form-group">
						<label>Name:</label>
						<input type="text" name="name" class="form-control" value="{{ old('name') }}">
						@error ('name')
							<i style="color: red;"> {{ $errors->first('name') }}</i>
						@enderror
					</div>
				</div>

				<div class="col-6">
					<div class="form-group">
						<label>Price:</label>
						<input type="number" name="price" class="form-control">$
					</div>
				</div>

				<div class="col-6">
					<label>Image:</label>
					<div class="custom-file">
						<input type="file" class="custom-file-input" name="image">
    				<label class="custom-file-label">Choose file...</label>
					</div>
					@error ('image')
						<i style="color: red;"> {{ $errors->first('image') }}</i>
					@enderror
				</div>

				<div class="col-6">
					<div class="form-group">
						<label>Brand:</label>
						<input type="text" name="brand" class="form-control">
						@error ('brand')
							<i style="color: red;"> {{ $errors->first('brand') }}</i>
						@enderror
					</div>
				</div>

				<div class="col-6">
					<div class="form-group">
						<label>Category:</label>
						<select class="form-control" name="category_id">
							<option value="">Choose category</option>
							@foreach ($categories as $category)
								<option value="{{ $category->id }}"> {{ $categories->name }}</option>
							@endforeach
						</select>
						@error ('category_id')
							<i style="color: red;"> {{ $errors->first('category_id') }}</i>
						@enderror
					</div>
				</div>

			</div>

			<button type="submit" class="btn btn-success">SAVE</button>
		</form>
	</div>
@endsection
