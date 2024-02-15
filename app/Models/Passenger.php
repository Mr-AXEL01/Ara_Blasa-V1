<?php

namespace App\Models;

use App\Models\Traits\OneToOneTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends User
{
    use HasFactory;
    use OneToOneTrait;

    protected $fillable = [
      'user_id'
    ];

    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }
}
