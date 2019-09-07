<?php

namespace App;

use App\Models\Republic;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    /**
     * @var array
     * @author Heron Eugenio
     */
    protected $fillable = [
        'cpf',
        'value',
        'republic_id',
        'type_vote',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function republic()
    {
        return $this->belongsTo(Republic::class);
    }
}

