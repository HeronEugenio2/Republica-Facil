<?php

namespace App\Models;

use App\Vote;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Republic
 * @package App
 */
class Republic extends Model
{
    /**
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

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
        'user_id',
        'street',
        'district',
        'cep',
        'city',
        'state',
        'number',
        'up',
        'down',
    ];

    /**
     * @return BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * @return HasMany
     * @auathor Heron Eugenio
     */
    public function assignmets()
    {
        return $this->hasMany(Assignment::class, 'republic_id', 'id');
    }

    /**
     * @return HasMany
     * @author Heron Eugenio
     */
    public function spents()
    {
        return $this->hasMany(Spent::class, 'republic_id', 'id');
    }

    /**
     * @return HasMany
     * @auathor Heron Eugenio
     */
    public function advertisements()
    {
        return $this->hasMany(Advertisement::class);
    }

    /**
     * @return HasMany
     * @author Heron Eugenio
     */
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
