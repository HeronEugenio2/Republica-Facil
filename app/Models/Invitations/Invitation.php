<?php

namespace App\Models\Invitations;

use App\Models\Republic;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invitation extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'email',
        'republic_id',
        'user_id',
        'status_flag'
    ];

    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * @return BelongsTo
     */
    public function republic()
    {
        return $this->belongsTo(Republic::class);
    }

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
