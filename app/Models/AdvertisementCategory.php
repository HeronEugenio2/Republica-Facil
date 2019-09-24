<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class AdvertisementCategory
 * @package App\Models
 */
class AdvertisementCategory extends Model
{
    /**
     * @var string
     */
    protected $table = 'advertisement_categories';

    /**
     * @var array
     */
    protected $dates = [
        'created_at',
        'update_at',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'icon'
    ];

    /**
     * @return HasMany
     */
    public function advertisements()
    {
        return $this->hasMany(Advertisement::class);
    }
}

