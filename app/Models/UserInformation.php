<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserInformation extends Model
{
    protected $table = 'user_informations';

    protected $fillable = [
        'name',
        'cpf',
        'birth',
        'active',
        'user_id',
    ];

    /**
     * @return HasOne
     */
    public function userInformation()
    {
        return $this->hasOne(User::class);
    }
}
