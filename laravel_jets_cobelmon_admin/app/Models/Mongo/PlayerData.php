<?php

namespace App\Models\Mongo;

use MongoDB\Laravel\Eloquent\Model;

class PlayerData extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'PlayerDataCollection';
    public $timestamps = false;
    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    public $incrementing = false;   
}
