@extends('template')

@section('pageTitle', 'Profile' . Auth::user()->name)


<div class="alineador">
    <form  action="route('user-edit', $user)" method="post" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
    <div class="container-general">

        <h1 class="titulo">Edit User</h1>

            <div class="formulario-birras">
              <div class="casilleros">
                <label class="label" for="">Email</label><br>
                <input type="email" class="input" name="email" value="{{ old ('email') ?? $user->email}}">
              </div>
              @if ($errors->has("email"))
              <span class="invalid-feedback" role="alert">
                <strong>{{$errors->first("email")}}</strong>
                <br>
              </span>
              @endif
            </div>

            <div class="formulario-birras">
              <div class="casilleros">
                <label class="label" for="">Imagen</label><br>
                <input type="file" name="image" value="">
              </div>
              @if ($errors->has("image"))
                <span class="invalid-feedback" role="alert">
                  <strong>{{$errors->first("image")}}</strong>
                  <br>
                </span>
              @endif
            </div>

            <button type="submit" class="botonera" name="button">Update</button>

        </div>
    </form>
</div>


@endsection
