<?php

namespace App\Models\Traits;

use App\Models\User;

trait OneToOneTrait {

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
