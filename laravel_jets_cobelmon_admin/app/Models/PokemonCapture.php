<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokemonCapture extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'species',
        'species_id',
        'shiny',
        'nickname',
        'gender',
        'form',
        'captured_ball',
        'original_trainer_uuid',
        'is_legendary',
        'types',
        'level',   
        'user_id',
        'in_team',
    ];
}
