<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Auth;
use Illuminate\Http\Request;



class UserController extends Controller
{
    public function index(){
      $user= \Auth::user();
      return view( 'profile')->with('user', $user);
    }

    public function edit(){
      $user= \Auth::user();
      return view('user-edit', compact('user'));
    }

    public function update (Request $request) {
      $request->validate([
        'avatar' => 'required | image',
      ]);

      $user = \Auth::user();

      $user->name = $request->name;
      $user->surname = $request->surname;
      $user->email = $request->email;

      $imagen = $request->file('avatar');

      if ($imagen) {
        // Creo un nombre único para archivo imagen
        $imagenFinal = uniqid("img_") . "." . $imagen->extension();
        // Subo el archivo en la carpeta elegida
        $imagen->storePubliclyAs("/public/avatars", $imagenFinal);
      };

      // Se actualiza el nombre de la imagen
      $user->avatar = $imagenFinal;
      $user->save();
      return redirect('/profile');
    }

}
