<?php

use App\Http\Controllers\V1\Admin\ReminderController;

use Illuminate\Support\Facades\Route;

//Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {

    Route::get('reminders', [ReminderController::class, 'index']);
    Route::post('reminders', [ReminderController::class, 'store']);
    Route::get('reminders/{reminder}', [ReminderController::class, 'show']);
    Route::post('reminders/{reminder}', [ReminderController::class, 'update']);
    Route::delete('reminders/{reminder}', [ReminderController::class, 'destroy']);
    
  
    Route::get('reminders-search/{search}', [ReminderController::class, 'searchItem']);
 
 //}); 