<?php

namespace App;

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
        'name', 'email', 'password',
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
    protected $with = ['republic.type'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * @author Heron Eugenio
     */
    public function republic()
    {
        return $this->belongsTo(Republic::class);
    }

    public function assignmets()
    {
        return $this->hasMany(Assignment::class, 'id', 'assignment_id');
    }
}
