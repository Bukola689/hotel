<?php

use App\Http\Controllers\V1\Admin\BookingController;

use Illuminate\Support\Facades\Route;

//Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {

    Route::get('/bookings', [BookingController::class, 'index']);
    Route::post('/bookings', [BookingController::class, 'store']);
    Route::get('/bookings/{booking}', [BookingController::class, 'show']);
    Route::put('/bookings/{booking}', [BookingController::class, 'update']);
    Route::DELETE('/bookings/{booking}', [BookingController::class, 'destroy']);
    
    Route::get('bookings-search/{name}', [BookingController::class, 'searchBooking']);
 
 //}); 