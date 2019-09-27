<?php

//Ruta Raiz

Route::get('/', function () {
  return view('home');
});

//Ruta Perfil

Route::get('/profile', function () {
  return view('profile');
})->name('profile')->middleware('auth');

//Ruta Preguntas Frecuentes

Route::get('/faq', function () {
  return view('FAQ');
});

//Rutas register/loguin/log-out ademas de CRUD

Route::get('/Register', 'RegisterController@Validator');
Route::post('/Register', 'RegisterController@Create');
Route::post('/profile', 'UserController@update_avatar');

Route::get('/user-edit/{user}/edit', 'UserController@edit');
Route::patch('user-edit/{user}', 'UserController@update');

//Ruta CRUD de productos

Route::get('/product-list', 'ProductController@listado')->name('product.list');
Route::get('/detalle/{id}', 'ProductController@detalle')->name('details');
Route::get('/new-product', 'ProductController@createProduct')->middleware('auth','is_Admin');
Route::post('/new-product', 'ProductController@uploadProduct');
Route::post('/delete-product', 'ProductController@delete');
Route::get('/product-edit/{product}/edit', 'ProductController@edit');
Route::patch('/product-edit/{product}', 'ProductController@updateProduct');

//Ruta Buscador


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
