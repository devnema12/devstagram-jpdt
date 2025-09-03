<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller; //Creo que esta es otra solucion , para importar middleware
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str; //modificar el request

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


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

        //Modificar el request para que tenga el slog
        $request->request->add(['username' => Str::slug($request->username)]);

        //1 validar
        $request->validate([
            'name' => 'required',
            'username' => [
                'required',
                'unique:users,username,' . Auth::user()->id,
                'min:3',
                'max:20',
                'not_in:twitter,editar-perfil'
            ],

        ]);

        if ($request->imagen) {
            $manager = new ImageManager(new Driver());
            $input = $request->all();
            $imagen = $request->file('imagen');
            //Para que no se repitan los numeros
            $nombreImagen = Str::uuid() . "." . $imagen->extension();

            //guardar la imagen al servidor
            $imagenServidor = $manager->read($imagen);
            //agregamos efecto a la imagen con intervention
            $imagenServidor->scale(1000, 1000);
            // la unidad de mide en PX 1= 1pixiel

            //Mover la imagen al servidor --> eso lo guarda en public
            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;

            // para que guarde la imagen en esa ruta
            $imagenServidor->save($imagenPath);
        }

        //Guardar cambios

        //vericica si el usuario logueado 
        $usuario = User::find(Auth::user()->id);
        //si el logueado es igual al que se esta cambiando 
        $usuario->username = $request->username;
        //coje el nombre de la imagen 
        $usuario->imagen = $nombreImagen ??  Auth::user()->imagen ?? null;

        //guardar imagen
        $usuario->save();

        //redireccionar
        return redirect(route('posts.index', $usuario->username));
        //2 crear


    }
}
