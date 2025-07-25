<?php

namespace App\Models\Mongo;

use MongoDB\Laravel\Eloquent\Model;

class PC extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'PCCollection';
    public $timestamps = false;
    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    public $incrementing = false;
}
