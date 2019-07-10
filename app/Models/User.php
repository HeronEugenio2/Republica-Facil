<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'provider', 'provider_id',
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accounts()
    {
        return $this->hasMany(LinkedSocialAccount::class);
    }

    public function republic()
    {
        return $this->belongsTo(Republic::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function assignments()
    {
        return $this->belongsToMany(Assignment::class);
    }

    public function spents()
    {
        return $this->hasMany(Spent::class, 'user_id', 'id');
    }

    public function historySpents()
    {
        return $this->hasMany(SpentHistory::class);
    }

    public function userInformation()
    {
        return $this->hasOne(UserInformation::class);
    }
}
