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

    public function edit(User $user){
      $users = User::all();
      return view( 'user-edit', compact('user', 'users'));

    }


    public function update(User $user){
      $data = request()->validate ([
        'email' => 'required',
        'avatar' => '',
      ]);
      //dd($data);

      if (request("avatar")) {
       $imagePath = request("avatar")->store("avatars","public");//Guarda en la variable para poder trabajarla
       }
       // ARRAY MERGE PERMITE MODIFICAR EL VALOR DE "IMAGE" PARA PASARLE EL DE $IMAGEPATH
       $user->update(array_merge($data,["avatar"=> $imagePath], ));
       
       return view('/profile');

    }

    public function update_avatar(Request $request){
      $request-> validate([
        'avatar' => 'required|image',
      ]);
      $user = Auth::user();

      $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();
      $request->avatar->storeAs('avatars',$avatarName);
      $user->avatar = $avatarName;
      $user->save();
    return back();

    }
}
