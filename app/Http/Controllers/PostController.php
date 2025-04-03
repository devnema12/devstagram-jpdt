<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller; //Creo que esta es otra solucion
use Illuminate\Support\Facades\Gate; //Para Atorizar el metodo de eliminar delete

class PostController extends Controller
{
   // se ejecuta cuando es instanciado este controlador
   public function __construct()
   {
      // Para proteger la ruta de muro, se ejecuta el midelware antes del index para verificar
      // que el usuario esta autenticado
      $this->middleware('auth')->except(['show', 'index']);
   }

   // da render a Dashboard
   public function index(User $user)
   {

      //Consultar tabla de popts y filtar por el usuario que esta en la url
      // $posts = Post::where('user_id', $user->id)->get(); // --> sin paginacion
      $posts = Post::where('user_id', $user->id)->paginate(8);


      // toma el modelo de usuario para consultar el usurname del usuario

      return view('dashboard', [
         'user' => $user,
         'posts' => $posts,
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
      //1. Para validar los campos 
      $request->validate([
         'titulo' => 'required|max:255',
         'description' => 'required',
         'imagen' => 'required',
      ]);

      //2.  para crear el registro en la bd
      // Post::create([
      //    'titulo' => $request->titulo,
      //    'description' => $request->description,
      //    'imagen' => $request->imagen,
      //    'user_id' => Auth::user()->id,
      // ]);

      //2.  para crear el registro en la bd utilizando las relaciones
      /*Como tenemos request obtenemos el usarioa actual con user() , lusgo llamamos la relacion de posts()
      luego creamos los datos
      */

      $request->user()->posts()->create([
         'titulo' => $request->titulo,
         'description' => $request->description,
         'imagen' => $request->imagen,
         'user_id' => Auth::user()->id,
      ]);

      //3. el fillable en el modelo

      //4. edirecionar
      return redirect()->route('posts.index', Auth::user()->username);
   }


   //Metodo para buscar un 
   public function show(User $user, Post $post)
   {

      return view('posts.show', [
         'post' => $post,
         'user' => $user,
      ]);
   }

   //Metoso para Eliminar comentarios

   public function destroy(Post $post)
   {
      // utilizo el metodo autorize y le paso el metodo delete de  el policy y le paso el objeto actual
      //El post lo tomamos de la url com route model vainding

      //Si el usaurio dueño del post es el mismo de que va a eliminar el comentario entonces devuelve true o false
      Gate::allows('delete', $post); // true o false
      //Eliminar
      $post->delete();

      //Redireccionar
      return redirect()->route('posts.index', Auth::user()->username);
   }
}
