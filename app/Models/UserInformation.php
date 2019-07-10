<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'date_birth',
        'user_type_enum',
        'email',
        'identification_type',
        'identification_number',
        'phone_extension',
        'phone_number',
        'phone_area_code',
        'profile_image_path',
        'complete_register_flag',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
