<?php

namespace App\Models\Mongo;

use MongoDB\Laravel\Eloquent\Model;

class PokeDex extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'PokeDexCollection';
    public $timestamps = false;
    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    public $incrementing = false;
}
