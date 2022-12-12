<?php

use App\Http\Controllers\V1\Admin\RoomController;

use Illuminate\Support\Facades\Route;

//Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {

    Route::get('/rooms', [RoomController::class, 'index']);
    Route::post('/rooms', [RoomController::class, 'store']);
    Route::get('/rooms/{room}', [RoomController::class, 'show']);
    Route::put('/rooms/{room}', [RoomController::class, 'update']);
    Route::DELETE('/rooms/{room}', [RoomController::class, 'destroy']);

    Route::get('rooms-search/{search}', [RoomController::class, 'searchRoom']);
   
 
 //}); 