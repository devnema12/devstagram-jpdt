<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImagenController extends Controller
{
    //
    public function store(Request $request)
    {
        $manager = new ImageManager(new Driver());
        $input = $request->all();
        $imagen = $request->file('file');
        //Para que no se repitan los numeros
        $nombreImagen = Str::uuid() . "." . $imagen->extension();

        //guardar la imagen al servidor
        $imagenServidor = $manager->read($imagen);
        //agregamos efecto a la imagen con intervention
        $imagenServidor->scale(1000, 1000);
        // la unidad de mide en PX 1= 1pixiel

        //Mover la imagen al servidor --> eso lo guarda en public
        $imagenPath = public_path('uploads') . '/' . $nombreImagen;

        // para que guarde la imagen en esa ruta
        $imagenServidor->save($imagenPath);

        return response()->json([
            'imagen' => $nombreImagen,

        ]);
    }
}
