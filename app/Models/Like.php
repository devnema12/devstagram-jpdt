<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //Para crear un registro, hay que crear el fillable con las columnas que se crearon en la tabla
    protected $fillable = [
        'user_id',
    ];
}
