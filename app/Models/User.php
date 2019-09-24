<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'image',
        'phone',
        'password',
        'provider',
        'provider_id',

    ];
    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * @var array
     */
    protected $with = ['republic.type', 'republic.assignmets', 'republic.spents', 'historySpents'];

    /**
     * @return HasMany
     */
    public function accounts()
    {
        return $this->hasMany(LinkedSocialAccount::class);
    }

    /**
     * @return BelongsTo
     */
    public function republic()
    {
        return $this->belongsTo(Republic::class);
    }

    public function assignmets()
    {
        return $this->hasMany(Assignment::class, 'id', 'assignment_id');
    }

    public function spents()
    {
        return $this->hasMany(Spent::class, 'user_id', 'id');
    }

    public function historySpents()
    {
        return $this->hasMany(SpentHistory::class);
    }

    public function advertisements()
    {
        return $this->hasMany(Advertisement::class);
    }
}
