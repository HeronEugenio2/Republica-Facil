<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    /**
     * @var array
     * @author Heron Eugenio
     */
    protected $fillable = [
        'start',
        'end',
        'description',
        'situation',
        'republic_id',
        'user_id',
    ];

    public function republic()
    {
        return $this->belongsTo(Republic::class, 'republic_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
