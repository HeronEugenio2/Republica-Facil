<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * @author Heron Eugenio
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * @author Heron Eugenio
     */
    public function republic()
    {
        return $this->belongsTo(Republic::class, 'republic_id', 'id');
    }

    public function images()
    {
        return $this->belongsTo(AdvertisementImage::class, 'image_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(AdvertisementCategory::class, 'category_id', 'id');
    }


}
