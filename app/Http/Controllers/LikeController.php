<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    public function store(Request $request, Post $post)
    {

        $post->likes()->create([
            'user_id' => $request->user()->id
        ]);

        return back();
    }


    public function destroy(Request $request, Post $post)
    {
        //En el usuario ya biene el modelo de likes y leujo se filtra y se eliminar el like
        $request->user()->likes()->where('post_id', $post->id)->delete();
        //redirecionar
        return back();
    }
}
