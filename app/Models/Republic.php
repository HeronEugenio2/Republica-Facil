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
        'street',
        'neighborhood',
        'cep',
        'city',
        'state',
        'number',
        'user_id',
    ];

    //   Relacionamento 1 pra N
    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

    //   Relacionamento 1 pra N
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


}
