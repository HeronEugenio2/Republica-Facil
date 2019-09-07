<?php

namespace App\Models\Invitations {

    use App\Models\Republic;
    use App\Models\User;
    use Illuminate\Database\Eloquent\Model;

    class Invitation extends Model
    {
        protected $fillable = [
            'email',
            'republic_id',
            'user_id',
        ];
        /**
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         * @author Heron Eugenio
         */
        public function republic()
        {
            return $this->belongsTo(Republic::class);
        }
        /**
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         * @author Heron Eugenio
         */
        public function user()
        {
            return $this->belongsTo(User::class);
        }
    }
}
