<?php

use App\Http\Controllers\V1\Admin\CustomerController;

use Illuminate\Support\Facades\Route;

//Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {

    Route::get('/customers', [CustomerController::class, 'index']);
    Route::post('/customers', [CustomerController::class, 'store']);
    Route::get('/customers/{customer}', [CustomerController::class, 'show']);
    Route::put('/customers/{customer}', [CustomerController::class, 'update']);
    Route::DELETE('/customers/{customer}', [CustomerController::class, 'destroy']);
    
    Route::get('customers-search/{name}', [CustomerController::class, 'searchBooking']);
 
 //}); 