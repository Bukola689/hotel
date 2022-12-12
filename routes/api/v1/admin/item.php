<?php

use App\Http\Controllers\V1\Admin\ItemController;

use Illuminate\Support\Facades\Route;

//Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {

    Route::get('/items', [ItemController::class, 'index']);
    Route::post('/items', [ItemController::class, 'store']);
    Route::get('/items/{item}', [ItemController::class, 'show']);
    Route::put('/items/{item}', [ItemController::class, 'update']);
    Route::DELETE('/items/{item}', [ItemController::class, 'destroy']);
    
    Route::get('items-search/{search}', [ItemController::class, 'searchItem']);

    
 
 //}); 