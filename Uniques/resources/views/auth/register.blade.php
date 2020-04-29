@extends('template')

@section('mainContent')
<div class="container container-form">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card div-shadow p-3 mb-5 rounded ">

                <div class="card-body">
                    <form method="POST" class="theForm" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-row col-md-12">
                          <div class="form-group col-md-6 padding-null">
                              <label for="name" class="col-md-12 col-form-label text-md-center">{{ __('Name') }}</label>

                              <div class="col-md-12">
                                  <input id="name" type="text" placeholder="Enter your name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                                  <div class="invalid-feedback">
                                    <!-- Mensaje de error -->
                                  </div>

                                  @error('name')
                                      <span class="invalid-feedback text-danger" role="alert">
                                          <strong>{{$message}}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group col-md-6 padding-null">
                              <label for="surname" class="col-md-12 col-form-label text-md-center">{{ __('Surname') }}</label>

                              <div class="col-md-12">
                                  <input id="surname" type="text" placeholder="Enter you surname" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}"  autocomplete="surname" autofocus>

                                    <div class="invalid-feedback">
                                      <!-- Mensaje de error -->
                                    </div>

                                    @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                              </div>
                          </div>
                        </div>

                        <div class="form-row col-md-12">
                          <div class="form-group col-md-6 padding-null">
                              <label for="email" class="col-md-12 col-form-label text-md-center">{{ __('Email') }}</label>

                              <div class="col-md-12">
                                  <input id="email" type="email" placeholder="Enter your email address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                      <div class="invalid-feedback">
                                        <!-- Mensaje de error -->
                                      </div>

                                      @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{$message}}</strong>
                                      </span>
                                      @enderror
                              </div>
                          </div>

                          <div class="form-group col-md-6 padding-null">
                              <label for="Re-email" class="col-md-12 col-form-label text-md-center">{{ __('Confirm Email') }}</label>

                              <div class="col-md-12">
                                  <input id="Re-email" type="Re-email" placeholder="Confirm your email" class="form-control @error('Re-email') is-invalid @enderror" name="Re-email" value="{{ old('Re-email') }}"  autocomplete="Re-email">

                                      <div class="invalid-feedback">
                                        <!-- Mensaje de error -->
                                      </div>

                                      @error('Re-email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{$message}}</strong>
                                      </span>
                                      @enderror
                              </div>
                          </div>

                        </div>

                        <div class="form-row col-md-12">
                          <div class="form-group col-md-6 padding-null">
                              <label for="password" class="col-md-12 col-form-label text-md-center">{{ __('Password') }}</label>

                              <div class="col-md-12">
                                  <input id="password" type="password" placeholder="Enter your password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                      <div class="invalid-feedback">
                                        <!-- Mensaje de error -->
                                      </div>

                                      @error('password')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{$message}}</strong>
                                      </span>
                                      @enderror
                              </div>
                          </div>

                          <div class="form-group col-md-6 padding-null">
                            <label for="password-confirm" class="col-md-12 col-form-label text-md-center">{{ __('Password Confirm') }}</label>

                              <div class="col-md-12">
                                  <input id="password-confirm" type="password" placeholder="Confirm your password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                                  <div class="invalid-feedback">
                                    <!-- Mensaje de error -->
                                  </div>

                                  @error('password_confirmation')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{$message}}</strong>
                                  </span>
                                  @enderror
                              </div>
                          </div>
                        </div>


                        <div class="form-row col-md-12">
                          <div class="form-group col-md-12 padding-null @error('pais') has-error @enderror text-center">
                              <label for="country" class="col-md-12 text-center">{{ __('Country') }}</label>

                                <select id="country" class=" form-control " name="country" value="{{ old('country') }}"  autocomplete="country" autofocus>

                                </select>
                                <div class="invalid-feedback">
                                  <!-- Mensaje de error -->
                                </div>
                                      @error('country')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{$message}}</strong>
                                      </span>
                                      @enderror
                          </div>
                        </div>

                        <div class="form-row col-md-12" id="provincia" style="display:none;">
                          <div class="form-group col-md-12 padding-null @error('city') has-error @enderror text-center">
                              <label for="city" class="col-md-12 text-center">{{ __('City') }}</label>
                                <select id="city" class="form-control" name="city" value="{{ old('city') }}"  autocomplete="city" autofocus>
                                </select>


                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                          </div>
                        </div>

                        <div class="form-row col-md-12">
                          <div class="form-group col-md-12 padding-null @error('avatar') has-error @enderror text-center">
                              <label for="avatar" class="col-md-12 text-center">{{ __('Profile Picture') }}</label>
                              <input id="avatar" type="file" class=" " name="avatar" value="{{ old('avatar') }}"  autocomplete="avatar" autofocus>
                              <div class="invalid-feedback">
                                <!-- Mensaje de error -->
                              </div>

                                @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{$message}}</strong>
                                </span>
                                @enderror
                          </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-4 offset-md-4">
                                <button type="submit" class="btn btn-success btn-lg btn-block">
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
