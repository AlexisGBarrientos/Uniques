<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});


Route::get('/profile', function () {
	if (Auth::user()) {
		echo "Hola " . Auth::user()->name . "<br>";
		echo "<img src='/storage/fotos/" . Auth::user()->avatar . "' width='100' /><br>";
	} else {
		return redirect('/register');
	}
})->name('profile');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
