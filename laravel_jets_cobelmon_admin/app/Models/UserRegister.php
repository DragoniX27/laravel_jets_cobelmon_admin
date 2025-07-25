<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRegister extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'username_lower',
        'email',
        'phone',
        'password',
        'id_pk_fav',
        'id_pk2_fav',
        'lvl_minecraft',
        'lvl_pokemon',
        'description'
    ];
}
