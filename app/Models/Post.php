<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    //
    use HasFactory;

    // el fillable es importante y si no crea el registro
    protected $fillable = [
        'titulo',
        'description',
        'imagen',
        'user_id',
    ];

    //1. crear Metodo de realcion donde un posts pertenece a un usuario
    public function user()
    {
        //2. un posts pertenece a un usaurio
        return $this->BelongsTo(User::class)->select(['name', 'username']);
    }
    //2
    public function  comentarios()
    {

        //2.1 Un post tierne multiples comentario
        //2.2 importar el modelo de comentario
        return $this->HasMany(Comentario::class);
    }

    // 3 
    public function likes()
    {
        // 3.1 un posts va a tener muchos likes
        return $this->hasMany(Like::class);
    }

    //Revisa que si un usuario ya dio like
    public function checkLike(User $user)
    {
        // se situa en la tabla de likes y revisa si la columna de user_id contiene el id que se le pasa
        return $this->likes->contains('user_id', $user->id);
    }
}
