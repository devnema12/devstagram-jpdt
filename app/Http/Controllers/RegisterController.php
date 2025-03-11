<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    //Metodos

    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        // dd('post...', $request);

        //Modificar el request
        $request->request->add(['username' => Str::slug($request->username)]);

        //Validacion
    $request->validate( [
            'name' => 'required|max:35',
            'username' => 'required|min:3|max:20|unique:users',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6',
            // 'password' => 'required',
        ]);

        // dd('post...');

        //Crear un registro
        User::create([
            'name' =>$request->name,
            'username' =>$request->username,
            'email' =>$request->email,
            'password' =>Hash::make($request->password),
        ]);


    }

      

}
