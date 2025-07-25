<?php

namespace App\Models\Mongo;

use MongoDB\Laravel\Eloquent\Model;

class PlayerParty extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'PlayerPartyCollection';
    public $timestamps = false;
    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    public $incrementing = false;

}
