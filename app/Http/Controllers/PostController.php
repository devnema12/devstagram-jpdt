<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller; //Creo que esta es otra solucion

class PostController extends Controller
{
    // se ejecuta cuando es instanciado este controlador
 public function __construct(){
    $this->middleware('auth');
 }

    public function index(){
         return view('dashboard');
    }
}
