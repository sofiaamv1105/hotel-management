<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hotels', [HotelController::class, 'index'])->name('hotels.index');
Route::post('/hotels', [HotelController::class, 'store'])->name('hotels.store');
Route::get('/hotels/hotel', [HotelController::class, 'create'])->name('hotels.create');
