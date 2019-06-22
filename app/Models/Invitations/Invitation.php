<?php

namespace App\Models\Invitations {

    use Illuminate\Database\Eloquent\Model;

    class Invitation extends Model
    {
        protected $fillable = [
            'email',
            'republic_id',
            'user_id',
        ];
    }
}
