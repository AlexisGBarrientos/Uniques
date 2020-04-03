@extends('template')


@section('pageTitle', 'Create Product')

@section('mainContent')

	<div class="container-fluid card col-6" style="margin-top:30px; margin-bottom: 30px;">
		<h2 class="card-title mt-3">Create Product</h2>

		<form action="/new-product" method="post" enctype="multipart/form-data">
			{{-- Genera un input de tipo hidden con el token --}}
			@csrf

			<div class="row justify-content-between">
					<div class="col-8">
						<div class="form-group">
							<label>Name:</label>
							<input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Ej: Table...">
							@error ('name')
								<i style="color: red;"> {{ $errors->first('name') }}</i>
							@enderror
						</div>
					</div>

					<div class="col-4">
						<div class="form-group">
							<label>Price:</label>
							<input type="number" name="price" class="form-control" placeholder="$">
						</div>
					</div>
			</div>


			<div class="row justify-content-around text-center">
				<div class="col-3">
					<div class="form-group">
						<label>Brand:</label>
						<select class="custom-select" name="brand_id">
							<option>Choise a Brand</option>
							@foreach ($brands as $brand)
								<option value=" {{ $brand->id }} "> {{ $brand->name }} </option>
							@endforeach
						</select>

						@error ('brand')
							<span>{{ $errors->first('brand') }}</span>
						@enderror
					</div>
				</div>

				<div class="col-4">
					<div class="form-group">
						<label>Category:</label>
							<select class="custom-select" name="category_id">
								<option>Choise a Category</option>
								@foreach ($categories as $category)
									<option value=" {{ $category->id }} "> {{ $category->name }} </option>
								@endforeach
							</select>
							@error ('category')
								<span>{{ $errors->first('category') }}</span>
							@enderror
					</div>
				</div>

				<div class="col-3">
					<div class="form-group">
						<label>Color:</label>
							<select class="custom-select" name="color_id">
								<option>Choise a Color</option>
								@foreach ($colors as $color)
									<option value="{{ $color->id }}"> {{ $color->name }} </option>
								@endforeach
							</select>
							@error ('color')
								<span>{{ $errors->first('color') }}</span>
							@enderror
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<div class="form-group">
						<label>Description:</label>
						<textarea name="description" class="form-control" type="text" rows="4" cols="80"></textarea>
						<!-- <input type="text" name="description" class="form-control"> -->
						@error ('description')
							<span>{{ $errors->first('description') }}</span>
						@enderror
					</div>
				</div>
			</div>


			<div class="row text-center justify-content-center">
				<div class="col-8">
					<label>Image:</label>
					<div class="custom-file">
						<input type="file" class="custom-file-input" name="image">
    				<label class="custom-file-label">Choose file...</label>
					</div>
					@error ('image')
						<span>{{ $errors->first('image') }}</span>
					@enderror
				</div>
			</div>


			<div class="row justify-content-center">
				<div class="col-4 text-center mt-3">
					<button type="submit" class="btn btn-success">SAVE</button>
				</div>

			</div>

		</form>
	</div>
@endsection
