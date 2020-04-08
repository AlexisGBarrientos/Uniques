@extends('template')


@section('pageTitle', $product->title)


@section('mainContent')

	<div class="container-fluid card col-6" style="margin-top:30px; margin-bottom: 30px;">
		<h2 class="card-title mt-3">Editing product: {{ $product->name }}</h2>

		<form action="/product-edit/{{ $product->id }}" method="post" enctype="multipart/form-data">
			@csrf
			{{ method_field('put') }}


			<div class="row justify-content-between">

				<div class="col-6">
					<div class="form-group">
						<label>Name:</label>
						<input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}">

						@error ('name')
							<i style="color: red;"> {{ $errors->first('name') }}</i>
						@enderror
					</div>
				</div>

        <div class="col-4">
					<div class="form-group">
						<label>Price:</label>
						<input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}">
					</div>
				</div>
		 </div>

		 <div class="row justify-content-around text-center my-2">

			<div class="col-3">
				 <div class="form-group">
					 <label>Brand:</label>
					 <select class="custom-select" name="brand_id">
					 		<option>Choise a Brand</option>
								@foreach ($brands as $brand)
									<option class="form-control" value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : null }} > {{ $brand->name }}</option>
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
						 <option>Choose category</option>
						 @foreach ($categories as $category)
							 <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : null }}	> {{ $category->name }}</option>
						 @endforeach
					 </select>
					 @error ('category')
						 <i style="color: red;"> {{ $errors->first('category') }}</i>
					 @enderror
				 </div>
			 </div>

			 <div class="col-3">
				 <div class="casilleros">
					 <label class="label" for="">Color</label><br>
					 <select class="custom-select" name="color_id">
						 <option>Elegi un color</option>
						 @foreach ($colors as $color)
							 <option value="{{$color->id}}" {{ $product->color_id == $color->id ? "selected" : null }} > {{ $color->name }}</option>
						 @endforeach
					 </select>
				 </div>
			 </div>
		 </div>

		 <div class="row my-2">
			 <div class="col-12">
				 <div class="form-group">
					 <label>Description:</label><br>
					 <textarea class="form-control" type="text" name="description" rows="4" cols="50">{{ old ('description') ?? $product->description}} </textarea>
				 </div>
				 @if ($errors->has("description"))
					<span class="invalid-feedback" role="alert">
						 <strong>{{$errors->first("description")}}</strong>
					</span>
				 @endif
			 </div>
		 </div>


    <div class="row text-center justify-content-center my-2">
      <div class="col-8">
        <label class="label" for="">Image</label>
        <input type="file" name="image">
      </div>
      @if ($errors->has("image"))
        <span class="invalid-feedback" role="alert">
          <strong>{{$errors->first("image")}}</strong>
        </span>
      @endif
    </div>

		<div class="row justify-content-center my-2">
			<div class="col-4 text-center mt-3">
				<button type="submit" class="btn btn-success">UPDATE</button>
				<a class="btn mr-2 btn-warning" href="/product-edit/{{$product->id}}/edit">Cancel</a>
			</div>
		</div>


		</form>
	</div>
@endsection
