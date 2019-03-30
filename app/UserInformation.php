<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    protected $fillable = [
        'name',
        'cpf',
        'email',
        'birth',
        'active',
    ];
}
