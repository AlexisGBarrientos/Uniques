@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">{{ __('Register') }}</div> -->

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Re-email" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Email') }}</label>

                            <div class="col-md-6">
                                <input id="Re-email" type="Re-email" class="form-control @error('Re-email') is-invalid @enderror" name="Re-email" value="{{ old('Re-email') }}" required autocomplete="Re-email">

                                @error('Re-email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-row col-md-10 col-md-offset-1">
                          <div class="form-group col-md-8 padding-null @error('pais') has-error @enderror text-center">
                              <label for="country" class="col-md-12 text-center">{{ __('Pais') }}</label>

                                <select id="country" class=" form-control " name="country" value="{{ old('country') }}"  autocomplete="country" autofocus>
                                </select>
                                <div class="opps">
                                  <!-- Mensaje de error -->
                                </div>
                                  @error('country')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                          </div>
                        </div>

                        <div class="form-row col-md-10 col-md-offset-1 ">
                          <div class="form-group col-md-8 padding-null hidden @error('city') has-error @enderror text-center">
                              <label for="city" class="col-md-12 text-center">{{ __('Provincia') }}</label>
                                <select id="city" class=" form-control " name="city" value="{{ old('city') }}"  autocomplete="city" autofocus>
                                </select>
                                <div class="opps">
                                  <!-- Mensaje de error -->
                                </div>
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          </div>
                        </div>

                        <div class="form-row col-md-10 col-md-offset-1">
                          <div class="form-group col-md-8 padding-null @error('file') has-error @enderror text-center">
                              <label for="file" class="col-md-12 text-center">{{ __('Foto de perfil') }}</label>
                              <input id="file" type="file" class=" " name="foto" value="{{ old('file') }}"  autocomplete="file" autofocus>
                              <div class="opps">
                                <!-- Mensaje de error -->
                              </div>
                              @error('file')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                          </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
