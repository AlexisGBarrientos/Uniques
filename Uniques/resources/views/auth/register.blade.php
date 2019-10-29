@extends('template')

@section('mainContent')
<div class="container container-form">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">{{ __('Register') }}</div> -->

                <div class="card-body">
                    <form method="POST" class="theForm" action="{{ route('register') }}">
                        @csrf

                        <div class="form-row col-md-12">
                          <div class="form-group col-md-6 padding-null">
                              <label for="name" class="col-md-12 col-form-label text-md-center">{{ __('Name') }}</label>

                              <div class="col-md-12">
                                  <input id="name" type="text" placeholder="Enter your name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                  @error('name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group col-md-6 padding-null">
                              <label for="surname" class="col-md-12 col-form-label text-md-center">{{ __('Surname') }}</label>

                              <div class="col-md-12">
                                  <input id="surname" type="text" placeholder="Enter you surname" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                  @error('surname')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                        </div>

                        <div class="form-row col-md-12">
                          <div class="form-group col-md-6 padding-null">
                              <label for="email" class="col-md-12 col-form-label text-md-center">{{ __('Email') }}</label>

                              <div class="col-md-12">
                                  <input id="email" type="email" placeholder="Enter your email address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                  @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group col-md-6 padding-null">
                              <label for="Re-email" class="col-md-12 col-form-label text-md-center">{{ __('Confirm Email') }}</label>

                              <div class="col-md-12">
                                  <input id="Re-email" type="Re-email" placeholder="Confirm your email" class="form-control @error('Re-email') is-invalid @enderror" name="Re-email" value="{{ old('Re-email') }}" required autocomplete="Re-email">

                                  @error('Re-email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                        </div>

                        <div class="form-row col-md-12">
                          <div class="form-group col-md-6 padding-null">
                              <label for="password" class="col-md-12 col-form-label text-md-center">{{ __('Password') }}</label>

                              <div class="col-md-12">
                                  <input id="password" type="password" placeholder="Enter your password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                  @error('password')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group col-md-6 padding-null">
                              <label for="password-confirm" class="col-md-12 col-form-label text-md-center">{{ __('Password Confirm') }}</label>

                              <div class="col-md-12">
                                  <input id="password-confirm" type="password" placeholder="Confirm your password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                              </div>
                          </div>
                        </div>


                        <div class="form-row col-md-12">
                          <div class="form-group col-md-12 padding-null @error('pais') has-error @enderror text-center">
                              <label for="country" class="col-md-12 text-center">{{ __('Country') }}</label>

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

                        <div class="form-row col-md-12">
                          <div  class="form-group col-md-12 padding-null @error('city') has-error @enderror text-center">
                              <label for="city" class="col-md-12 text-center">{{ __('City') }}</label>
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

                        <div class="form-row col-md-12">
                          <div class="form-group col-md-12 padding-null @error('file') has-error @enderror text-center">
                              <label for="file" class="col-md-12 text-center">{{ __('Profile Picture') }}</label>
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
                            <div class="col-md-8 offset-md-4">
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
