@extends('template')

@section('pageTitle', 'Perfil de' . Auth::user()->name)

@section('cssLink', '/css/bootstrap.min.css')

@section('mainContent')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-xs-12 col-sm-8 col-md-6">
            <div class="card">
                <img src="/storage/{{ Auth::user()->avatar }}" class="card-img-top" alt="{{ Auth::user()->name }}" class="img-rounded img-responsive">

                <div class="card-body">
                  <h2>Welcome {{ Auth::user()->name }} {{ Auth::user()->surname }}</h2>
                  <!-- {{ Auth::user() }} -->
                  <hr>
                    <p><i class="fas fa-envelope"></i> {{ Auth::user()->email }}</p>
                    <p><i class="fab fa-facebook"></i> {{ Auth::user()->name }} {{ Auth::user()->surname }}</p>
                  <hr>
                </div>


                <div class="btn-group row mb-0">
                  <div class="col-md-6 offset-md-3 text-center">
                    <form class="" action="/user-edit/{{ Auth::user()->id}}/edit" method="get">
                      <button type="submit" class="btn btn-md btn-primary">Edit</button>
                    </form>
                  </div>

                </div>

            </div>

          </div>
      </div>
  </div>

<script src="/js/app.js"></script>
<script src="/js/main.js"></script>
@endsection
