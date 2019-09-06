<?php

namespace App\Models;

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
        'user_id',
        'republic_id',
    ];

    public function republic()
    {
        return $this->belongsTo(Republic::class, 'republic_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');

    }

    public function history()
    {
        return $this->hasOne(SpentHistory::class);
    }
}
