<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    protected $fillable = [
        'street',
        'neighborhood',
        'cep',
        'city',
        'state',
        'number',
    ];
}
