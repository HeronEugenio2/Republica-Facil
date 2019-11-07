<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdvertisementImage extends Model
{
    protected $fillable = [
        'url',
        'advertissement_id',
    ];

    /**
     * @return BelongsTo
     */
    public function advertissement()
    {
        return $this->belongsTo(Advertisement::class);
    }

}
