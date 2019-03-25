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

    //   Relacionamento 1 pra N
    public function address()
    {
        return $this->belongsTo(Adress::class, 'address_id', 'id');
    }
}
