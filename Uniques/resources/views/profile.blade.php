@extends('template')

@section('pageTitle', 'Perfil de' . Auth::user()->name)

@section('cssLink', '/css/bootstrap.min.css')

@section('mainContent')
  <div class="container" style="margin-top:30px; margin-bottom: 30px;">
    <h2>Bienvenido {{ Auth::user()->name }}</h2>
      {{ Auth::user() }}
  </div>
@endsection
