<?php

namespace App\Models;

use App\Models\Traits\OneToOneTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends User
{
    use HasFactory;
    use OneToOneTrait;

    protected $fillable = [
        'description',
        'vehicleType',
        'licensePlate',
        'paymentMethod',
        'availability',
        'start_point',
        'destination',
        'user_id'
    ];
}
