<?php

namespace App\Http\Controllers;

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
}
