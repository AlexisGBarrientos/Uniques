@if (session('adminError'))
	<div class="alert alert-danger">
		{{ session('adminError') }}
	</div>
@endif

@extends('template')


@section('pageTitle', 'Detalles')


@section('mainContent')


  <div class="container">
    <section class="container">

      <article class="container" id="1">
        <div class="col-md-4">
          <img class="img-thumbnail" alt="Responsive image" src="/storage/{{$product->image}}" style="background-color:black" alt="">
        </div>

        <div class="col-md-6">
          <h3>{{$product->name}}</h3>
            <p>{{$product->description}}<br><br>
              DESCRIPTION:
              <ul>
                <li><i>Brand – {{$product->brand}}.</i></li>
                <li><i>Category – {{$product->category}}.</i></li>
                <li><i>Price – {{$product->price}} $.</i></li>
              </ul>
            </p>
        </div>
        @auth
           @if (Auth::user()->isAdmin())
               <div class="col-md-2" >
                 <form class="" action="/deleteProduct" method="post">
                   {{csrf_field()}}
                   <div>
                     <input type="hidden" name="id" value="{{$product->id}}">
                   </div>
                   <div >
                     <input type="submit" name="" value="Product Destroy">
                   </div>
                 </form>
                    <a href="/product-edit/{{$product->id}}/edit">Edit</a>
               </div>
             @endif
          @endauth

      </article>


        </div>

    </section>



@endsection
