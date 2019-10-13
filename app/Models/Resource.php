<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Resource
 * @package App\Models
 */
class Resource extends Model
{
    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * @var array
     */
    protected $fillable = [
        'name',
    ];


    public function assingments()
    {
        return $this->belongsToMany(Republic::class);
    }
}
