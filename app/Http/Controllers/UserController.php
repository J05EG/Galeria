<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function index(){
        return view('auth.perfil');
    }

    public function store(Request $request){
        if($request->hasFile('avatar')){
            $request->validate([
                'avatar' => 'required|image|max:2048'
            ]);
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(\public_path('/storage/image/avatar/' . $filename));
            $user = User::findOrFail(Auth::user()->id);
            $user->avatar = $filename;
            $user->save();
            return redirect()->route('user.index');
        }
    }

    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        if($usuario->name != $request->input('name')){
            $usuario->name=$request->input('name');
            Session::flash('message','Nombre actualizado correctamente.');
        }
        
        if($request->input('newpassword') != null){
            if($request->input('newpassword') == $request->input('password_confirmation')){
                $usuario->password = Hash::make($request->input('newpassword'));
                Session::flash('message','Password actualizada correctamente.');
            }else{
                Session::flash('message','Las claves no coinsiden.');
            }
        }
        $usuario->save();
        return redirect()->route('user.index');
    }
}
