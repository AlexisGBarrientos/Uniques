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


    // TODO ESTE CÓDIGO ESTÁ MAL. ALGO ESTABA PINCHANDO POR ESO LO COMENTÉ
    // public function update(User $user){

      // $data = request()->validate ([
      //   'email' => 'required',
      //   'avatar' => '',
      // ]);
      // //dd($data);

      // if (request("avatar")) {
      //  $imagePath = request("avatar")->store("avatars","public");//Guarda en la variable para poder trabajarla
      //  }
      //  // ARRAY MERGE PERMITE MODIFICAR EL VALOR DE "IMAGE" PARA PASARLE EL DE $IMAGEPATH
      //  $user->update(array_merge($data,["avatar"=> $imagePath], ));
       
      //  return view('/profile');

    // }

    
    // ESTO YA NO SIRVE PARA NADA, EL MÉTODO UPDATE LO RESUELVE TODO
    // public function update_avatar(Request $request){
    //   $request-> validate([
    //     'avatar' => 'required|image',
    //   ]);
    //   $user = Auth::user();

    //   $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();
    //   $request->avatar->storeAs('avatars',$avatarName);
    //   $user->avatar = $avatarName;
    //   $user->save();
    // return back();

    // }
}
