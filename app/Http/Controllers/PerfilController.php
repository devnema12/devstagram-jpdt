<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller; //Creo que esta es otra solucion , para importar middleware

class PerfilController extends Controller
{
    //proteger la ruta

    public function __construct()
    {
        $this->middleware('auth');
    }
    //mostrar la vista
    public function index()
    {
        // Solo usuarios logueados verán esto
        dd('mostradno fomrulario');
    }
}
