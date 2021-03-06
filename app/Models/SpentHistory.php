<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpentHistory extends Model
{
    /**
     * @var array
     * @author Heron Eugenio
     */
    protected $fillable = [
        'month',
        'value',
        'spent_id',
        'user_id',
        'republic_id',
    ];

    public function republic()
    {
        return $this->belongsTo(Republic::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function spent()
    {
        return $this->hasMany(Spent::class);
    }
}
