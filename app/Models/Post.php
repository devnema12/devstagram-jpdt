<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
