<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\HabitacionController;
use App\Http\Controllers\ReservaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/hotels', [HotelController::class, 'index'])->name('hotels.index');
Route::post('/hotels', [HotelController::class, 'store'])->name('hotels.store');
Route::get('/hotels/hotel', [HotelController::class, 'create'])->name('hotels.create');
Route::delete('/hotels/{hotel}', [HotelController::class, 'destroy'])->name('hotels.destroy');
Route::put('/hotels/{hotel}', [HotelController::class, 'update'])->name('hotels.update');
Route::get('/hotels/{hotel}/edit', [HotelController::class, 'edit'])->name('hotels.edit');

Route::get('/habitacions', [HabitacionController::class, 'index'])->name('habitacions.index');
Route::post('/habitacions', [HabitacionController::class, 'store'])->name('habitacions.store');
Route::get('/habitacions/habitacion', [HabitacionController::class, 'create'])->name('habitacions.create');
Route::delete('/habitacions/{habitacion}', [HabitacionController::class, 'destroy'])->name('habitacions.destroy');
Route::put('/habitacions/{habitacion}', [HabitacionController::class, 'update'])->name('habitacions.update');
Route::get('/habitacions/{habitacion}/edit', [HabitacionController::class, 'edit'])->name('habitacions.edit');

Route::get('/reservas', [ReservaController::class, 'index'])->name('reservas.index');
Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store');
Route::get('/reservas/reserva', [ReservaController::class, 'create'])->name('reservas.create');
Route::delete('/reservas/{reserva}', [ReservaController::class, 'destroy'])->name('reservas.destroy');
Route::put('/reservas/{reserva}', [ReservaController::class, 'update'])->name('reservas.update');
Route::get('/reservas/{reserva}/edit', [ReservaController::class, 'edit'])->name('reservas.edit');
