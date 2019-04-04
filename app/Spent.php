<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Spent
 * @package App
 * @author Heron Eugenio
 */
class Spent extends Model
{
    /**
     * @var array
     * @author Heron Eugenio
     */
    protected $fillable = [
        'description',
        'dateSpent',
        'value',
        'member',
    ];
}
