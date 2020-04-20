@extends('template')

@section('pageTitle', 'Profile')

@section('mainContent')
  <div class="container">
    <div class="row justify-content-center">
        <div class="card col-auto">
          <div class="card-body">
            <form class="theForm" action=" {{ route('user.edit', $user) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

                <h2 class="card-title mt-3">Edit your user, {{ Auth::user()->name }} {{ Auth::user()->surname }}</h2><hr>

                    <div class="text-auto-start">
                      <div class="row">
                        <div class="col">
                          <label class="label">Name</label>
                          <input type="text" name="name" class="form-control" value=" {{ old ('name') ?? $user->name}} ">
                            @if ($errors->has("name"))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first("name")}}</strong>
                                <br>
                              </span>
                            @endif
                        </div>
                      </div>
                    </div><br>

                    <div class="text-auto-start">
                      <div class="row">
                        <div class="col">
                          <label class="label">Surame</label>
                          <input type="text" name="surname" class="form-control" value=" {{ old ('surname') ?? $user->surname}} ">
                            @if ($errors->has("name"))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first("name")}}</strong>
                                <br>
                              </span>
                            @endif
                        </div>
                      </div>
                    </div><br>

                    <div class="text-md-start">
                      <div class="row">
                        <div class="col">
                          <label class="label" for="">Email</label>
                          <input type="email" class="form-control" name="email" value="{{ old ('email') ?? $user->email}}">
                            @if ($errors->has("email"))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{$errors->first("email")}}</strong>
                              <br>
                            </span>
                            @endif
                        </div>
                      </div>
                    </div><br>


                    <div class="text-md-start">
                      <div class="row">
                        <div class="col-6 offset-md-3">
                          <label class="custom-file-label" for="">Change image</label>
                          <div class="input-group">
                          <input type="file" class="custom-file-input {{ $errors->has("avatar") ? "is-invalid" : null }}" name="avatar">
                              @if ($errors->has("avatar"))
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{$errors->first("avatar")}}</strong>
                                  <br>
                                </span>
                              @endif
                          </div>
                        </div>

                      </div>
                    </div><br>

                    <div class="form-group row m-0 p-0">
                      <div class="col-md-6 offset-md-3 text-center">
                        <button type="submit" class="btn btn-md btn-primary" >Update</button>
                        <a href=" {{ route('profile') }} " class="btn btn-md btn-danger">Cancel</a>
                      </div>
                    </div><br>



            </form>
          </div>
        </div>
    </div>
  </div>
@endsection
