<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Republic
 * @package App
 * @author  Heron Eugenio
 */
class Republic extends Model
{
    /**
     * @var array
     * @author Heron Eugenio
     */
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
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * @author Heron Eugenio
     */
    //   Relacionamento n pra 1
    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * @author Heron Eugenio
     */
    //   Relacionamento n pra 1
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function spents()
    {
        return $this->hasMany(Spent::class, 'republic_id', 'id');
    }
}
