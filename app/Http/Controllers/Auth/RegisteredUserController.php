<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Passenger;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
//        dd($request->all());
        try {
            $request->validate([
                'name' => ['required', 'min:3', 'max:16', Rule::unique('users', 'name')],
                'email' => ['required', 'email', Rule::unique('users', 'email')],
                'password' => ['required', 'min:3', 'max:16', 'confirmed'],
                'picture' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp'],
                'role' => ['required', Rule::in(['passenger', 'driver'])],
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'picture' => $request->file('picture')->store('public/image'),
            ]);

            if ($request->role == 'driver') {
                $request->validate([
                    'description' => ['required'],
                    'vehicleType' => ['required'],
                    'licensePlate' => ['required'],
                    'paymentMethod' => ['required'],
                    'start_point' => ['required'],
                    'destination' => ['required'],
                ]);

                $driverData = [
                    'description' => $request->description,
                    'vehicleType' => $request->vehicleType,
                    'licensePlate' => $request->licensePlate,
                    'paymentMethod' => $request->paymentMethod,
                    'start_point' => $request->start_point,
                    'destination' => $request->destination,
                    'user_id' => $user->id,
                ];
                Driver::create($driverData);
            }

            if ($request->role === 'passenger') {
                $passengerData['user_id'] = $user->id;
                Passenger::create($passengerData);
            }

            Auth::login($user);

            return redirect('/dashboard');
        } catch (ValidationException $e) {
            // Handle validation errors
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        } catch (QueryException $e) {
            // Handle database query errors
            return redirect()->back()->withErrors(['error' => 'An error occurred while processing your request.'])->withInput();
        } catch (Throwable $e) {
            // Handle other unexpected errors
            return redirect()->back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }
}
