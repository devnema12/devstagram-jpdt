<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    //

    public function store(Request $request, User $user, Post $post)
    {
        //1. Validar

        $request->validate([
            'comentario' => 'required|max:255'
        ]);

        //2. Almacenar
        //2.1 Importar modelo de comentario
        //2.2 usar funcion create
        //2.3 el post_id biene de la url
        //2.4 tomar el usuario autenticado que comento
        //2.5 Agregar columnas en el fillable del modelo
        Comentario::create([
            'user_id' => Auth::user()->id,
            'post_id' => $post->id,
            'comentario' => $request->comentario,
        ]);



        //3. Imprimir mensaje
    }
}
