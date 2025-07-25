<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'species',
        'forms',
        'is_legendary',
        'sprites',
        'types',
        'generation'
    ];

}
