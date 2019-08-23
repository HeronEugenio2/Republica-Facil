<?php

namespace App\Models;

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
        'value',
        'type_id',
        'street',
        'district',
        'cep',
        'city',
        'state',
        'number',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * @author Heron Eugenio
     */
    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|\Illuminate\Database\Eloquent\Relations\HasMany
     * @author Heron Eugenio
     */
    public function user()
    {
        return $this->hasMany(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * @auathor Heron Eugenio
     */
    public function assignmets()
    {
        return $this->hasMany(Assignment::class, 'republic_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * @author Heron Eugenio
     */
    public function spents()
    {
        return $this->hasMany(Spent::class, 'republic_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * @auathor Heron Eugenio
     */
    public function advertisements()
    {
        return $this->hasMany(Advertisement::class);
    }
}
