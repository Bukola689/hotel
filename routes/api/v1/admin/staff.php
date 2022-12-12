<?php

use App\Http\Controllers\V1\Admin\StaffController;

use Illuminate\Support\Facades\Route;

//Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {

    Route::get('/staffs', [StaffController::class, 'index']);
    Route::post('/staffs', [StaffController::class, 'store']);
    Route::get('/staffs/{staff}', [StaffController::class, 'show']);
    Route::put('/staffs/{staff}', [StaffController::class, 'update']);
    Route::DELETE('/staffs/{staff}', [StaffController::class, 'destroy']);
    
    Route::get('staffs-search/{search}', [StaffController::class, 'searchStaff']);
 
 //}); 