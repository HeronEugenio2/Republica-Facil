<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdvertisementCategory extends Model
{
    protected $fillable = [
        'title',
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function advertissement()
    {
        return $this->hasMany(Advertisement::class);
    }

}

