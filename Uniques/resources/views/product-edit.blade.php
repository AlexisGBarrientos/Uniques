@extends('template')


@section('pageTitle', $product->title)


@section('mainContent')

	<div class="container" style="margin-top:30px; margin-bottom: 30px;">
		<h2>Editing product: {{ $products->name }}</h2>

		<form action="/products/edit/{{ $products->id }}" method="post">
			@csrf
			{{ method_field('patch') }}

			<div class="row">

				<div class="col-6">
					<div class="form-group">
						<label>Name:</label>
						<input type="text" name="name" class="form-control" value="{{ old('name', $products->name) }}">

						@error ('name')
							<i style="color: red;"> {{ $errors->first('name') }}</i>
						@enderror
					</div>
				</div>

				<div class="col-6">
					<div class="form-group">
						<label>Brand:</label>
						<input type="text" name="brand" class="form-control" value="{{ old('brand', $products->brand) }}">
						@error ('brand')
							<i style="color: red;"> {{ $errors->first('brand') }}</i>
						@enderror
					</div>
				</div>

        <div class="col-6">
					<div class="form-group">
						<label>Price:</label>
						<input type="number" name="price" class="form-control" value="{{ old('price', $products->price) }}">$
					</div>
				</div>

				<div class="col-6">
					<div class="form-group">
						<label>Description:</label>
            <textarea class="textarea" name="description" rows="2" cols="50">{{ old ('description') ?? $products->description}} </textarea>
					</div>
          @if ($errors->has("description"))
           <span class="invalid-feedback" role="alert">
              <strong>{{$errors->first("description")}}</strong>
           </span>
          @endif
				</div>

        <div class="">
          <div class="casilleros">
            <label class="label" for="">Imagen</label>
            <input type="file" name="image" value="">
          </div>
          @if ($errors->has("image"))
            <span class="invalid-feedback" role="alert">
              <strong>{{$errors->first("image")}}</strong>
            </span>
          @endif
        </div>

        <div class="col-6">
          <div class="casilleros">
            <label class="label" for="">Color</label><br>
            <select class="select" name="color_id">
              <option value="">Elegi un color</option>
              @foreach ($colors as $color)
                <option value="{{$color->id}}" {{ old('color_id', "") == $color->id ? "selected" : null }}>{{$color->color}}</option>
              @endforeach
            </select>
          </div>
        </div>

				<div class="col-6">
					<div class="form-group">
						<label>Category:</label>
						<select class="form-control" name="category_id">
							<option value="">Chose category</option>
							@foreach ($categories as $category)
								<option value="{{ $categories->id }}"	{{ $products->category_id == $category->id ? 'selected' : null }}	> {{ $categories->name }}</option>
							@endforeach
						</select>
						@error ('category_id')
							<i style="color: red;"> {{ $errors->first('category_id') }}</i>
						@enderror
					</div>
				</div>

			</div>

			<button type="submit" class="btn btn-success">UPDATE</button>
		</form>
	</div>
@endsection
