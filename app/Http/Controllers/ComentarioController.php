<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    //

    public function store(Request $request)
    {
        //1. Validar

        $request->validate([
            'comentario' => 'required|max:255'
        ]);

        //2. Almacenar




        //3. Imprimir mensaje
    }
}