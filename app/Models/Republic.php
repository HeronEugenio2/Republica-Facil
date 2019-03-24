<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Republic extends Model
{
    protected $fillable = [
        'name',
        'email',
        'description',
        'qtdMembers',
        'qtdVacancies',
        'type_id',
        'address_id',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }
}
