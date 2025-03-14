<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //
    public function store(){
       //
       Auth::logout();
       //Rediceccionar al usuario

       return redirect()->route('login');
    }
}
