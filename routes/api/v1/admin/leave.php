<?php

use App\Http\Controllers\V1\Admin\LeaveController;

use Illuminate\Support\Facades\Route;

//Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {

    Route::get('leaves', [LeaveController::class, 'index']);
    Route::post('leaves', [LeaveController::class, 'store']);
    Route::get('leaves/{leave}', [LeaveController::class, 'show']);
    Route::post('leaves/{leave}', [LeaveController::class, 'update']);
    Route::delete('leaves/{leave}', [LeaveController::class, 'destroy']);
    
    Route::get('leaves-search/{search}', [LeaveController::class, 'searchLeave']);
 
 //}); 