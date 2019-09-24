<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
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
     */
    protected $fillable = [
        'title',
    ];

    /**
     * @return HasMany
     */
    public function republics()
    {
        return $this->hasMany(Republic::class);
    }
}
