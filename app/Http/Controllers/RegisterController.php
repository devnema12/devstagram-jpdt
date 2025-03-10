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
            'name' => 'required|min:5',
            'username' => 'required|min:35',
        ]);
    }
}
