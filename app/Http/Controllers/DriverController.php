<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function updateAvailability(Request $request)
    {
        $request->validate([
            'availability' => ['required', 'in:Offline,En Route,Available'],
        ]);


        $driver = auth()->user()->driver;
        $driver->availability = $request->availability;
        $driver->save();

        return redirect()->back()->with('status', 'availability-updated');
    }

    public function updateTrip(Request $request)
    {
        $request->validate([
            'start_point' => ['required', 'string'],
            'destination' => ['required', 'string'],
        ]);

        $driver = $request->user()->driver;

        $driver->update([
            'start_point' => $request->start_point,
            'destination' => $request->destination,
        ]);

        return redirect()->back()->with('status', 'trip-updated');
    }

    public function search(Request $request)
    {
        $request->validate([
            'start_point' => ['required', 'string'],
            'destination' => ['required', 'string'],
            'depart_time' => ['required', 'date']
        ]);

        $startPoint = $request->start_point;
        $destination = $request->destination;

        $drivers = Driver::where('start_point', $startPoint)
            ->where('destination', $destination)
            ->where('availability', 'Available')
            ->get();

        return view('passenger.dashboard', [
            'drivers' => $drivers,
            'startPoint' => $startPoint,
            'destination' => $destination,
        ]);
    }
}
