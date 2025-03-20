<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller; //Creo que esta es otra solucion

class PostController extends Controller
{
   // se ejecuta cuando es instanciado este controlador
   public function __construct()
   {
      // Para proteger la ruta de muro, se ejecuta el midelware antes del index para verificar
      // que el usuario esta autenticado
      $this->middleware('auth');
   }

   // da render a Dashboard
   public function index(User $user)
   {
      // toma el modelo de usuario para consultar el usurname del usuario

      return view('dashboard', [
         'user' => $user,
      ]);
   }

   //permmite tener el fomulario
   public function  create()
   {
      return view('posts.create');
   }

   //Almacena en la base de datos
   public function store(Request $request)
   {
      $request->validate([
         'titulo' => 'required|max:255',
         'description' => 'required',
         'imagen' => 'required',
      ]);
   }
}
