@extends('template')


@section('pageTitle', 'Create Product')

@section('mainContent')

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
					<div class="form-group">
						<label>Brand:</label>
						<select class="select" name="brand_id">
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

				<div class="col-6">
					<div class="form-group">
						<label>Category:</label>
							<select class="select" name="category_id">
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

				<div class="col-6">
					<div class="form-group">
						<label>Color</label>
							<select class="select" name="color_id">
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

				<div class="col-6">
					<div class="form-group">
						<label>description:</label>
						<input type="text" name="description" class="form-control">
						@error ('description')
							<span>{{ $errors->first('description') }}</span>
						@enderror
					</div>
				</div>


				<div class="col-6">
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

			<button type="submit" class="btn btn-success">SAVE</button>
		</form>
	</div>
@endsection
