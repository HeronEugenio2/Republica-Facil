<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    /**
     * @var array $dates
     */
    protected $dates = ['deleted_at', 'created_at', 'deleted_at'];

    protected $fillable = [
        'name',
        'description',
        'image_path',
        'date_start',
        'date_end',
        'situation',
        'republic_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function republic()
    {
        return $this->belongsTo(Republic::class, 'republic_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
