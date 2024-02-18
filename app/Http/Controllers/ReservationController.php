<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'driver_id' => ['required', 'exists:drivers,id'],
            'start_point' => ['required', 'string'],
            'destination' => ['required', 'string'],
            'depart_time' => ['required', 'date'],
        ]);

        $passenger = $request->user()->passenger;

        Reservation::create(array_merge($validatedData, [
            'passenger_id' => $passenger->id,
        ]));

        return redirect()->back()->with('status', 'Reservation created successfully.');
    }


}
