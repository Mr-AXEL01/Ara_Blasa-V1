<?php

use App\Http\Controllers\DriverController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth' , 'verified')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// ------------driver----------------------
    Route::patch('/driver/update-availability', [DriverController::class, 'updateAvailability'])->name('driver.update.availability');
});

require __DIR__.'/auth.php';

Route::get('/driver/dashboard', function () {
    return view('driver.dashboard');
})->name('driver.dashboard')->middleware('auth');

Route::get('/passenger/dashboard', function () {
    return view('passenger.dashboard');
})->name('passenger.dashboard')->middleware('auth');

