<?php

use App\Http\Controllers\V1\Admin\UserController;

use Illuminate\Support\Facades\Route;

//Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {

    Route::get('/users', [UserController::class, 'index']);
    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users/{user}', [UserController::class, 'show']);
    Route::put('/users/{user}', [UserController::class, 'update']);
    Route::DELETE('/users/{user}', [UserController::class, 'destroy']);
    
    Route::get('users-search/{serach}', [UserController::class, 'searchUser']);
 
 //}); 