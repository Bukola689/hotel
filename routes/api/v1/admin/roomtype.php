<?php

use App\Http\Controllers\V1\Admin\RoomTypeController;

use Illuminate\Support\Facades\Route;

//Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {

    Route::get('/roomTypes', [RoomTypeController::class, 'index']);
    Route::post('/roomTypes', [RoomTypeController::class, 'store']);
    Route::get('/roomTypes/{roomType}', [RoomTypeController::class, 'show']);
    Route::put('/roomTypes/{roomType}', [RoomTypeController::class, 'update']);
    Route::DELETE('/roomTypes/{roomType}', [RoomTypeController::class, 'destroy']);

    Route::get('roomTypes-search/{name}', [RoomTypeController::class, 'searchRoomtype']);
   
 
 //}); 