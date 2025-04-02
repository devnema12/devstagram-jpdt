<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    //
    use HasFactory;

    //Para crear un registro, hay que crear el fillable con las columnas que se crearon en la tabla
    protected $fillable = [
        'user_id',
        'post_id',
        'comentario',
    ];
}
