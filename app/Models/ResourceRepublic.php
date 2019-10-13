<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ResourceRepublic
 * @package App\Models
 */
class ResourceRepublic extends Model
{
    protected $table = 'resource_anuncio';
    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * @var array
     */
    protected $fillable = [
        'anuncio_id',
        'resource_id',
    ];
}
