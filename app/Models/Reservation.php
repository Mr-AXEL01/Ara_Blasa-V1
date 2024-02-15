<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;


    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function passenger()
    {
        return $this->belongsTo(Passenger::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }

    public function frequentTrip()
    {
        return $this->belongsTo(FrequentTrip::class);
    }
}
