<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Advertisement
 * @package App\Models
 */
class Advertisement extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'image',
        'description',
        'title',
        'value',
        'republic_id',
        'category_id',
        'user_id',
        'image_id',
        'active',
    ];

    /**
     * @return BelongsTo
     * @author Heron Eugenio
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function republic()
    {
        return $this->belongsTo(Republic::class, 'republic_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function images()
    {
        return $this->belongsTo(AdvertisementImage::class, 'image_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(AdvertisementCategory::class, 'category_id', 'id');
    }
}
