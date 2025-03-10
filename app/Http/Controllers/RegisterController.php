<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //Metodos

    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        // dd('post...', $request);

        //Validacion
    $request->validate( [
            'name' => 'required|max:35',
            'username' => 'required|min:3|max:20|unique:users',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required',
            // 'password' => 'required',
        ]);
    }
}
