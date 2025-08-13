<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller; //Creo que esta es otra solucion , para importar middleware
use Illuminate\Support\Str; //modificar el request


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
        return view('perfil.index');
    }

    public function store(Request $request)
    {

        //Modificar el request
        $request->request->add(['username' => Str::slug($request->username)]);

        //1 validar
        $request->validate([
            'name' => 'required',
            'username' => 'required|min:3|max:20|unique:users',

        ]);

        //2 crear


    }
}
