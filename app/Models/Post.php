<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
