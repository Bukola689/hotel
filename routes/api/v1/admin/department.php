<?php

use App\Http\Controllers\V1\Admin\DepartmentController;

use Illuminate\Support\Facades\Route;

//Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {

    Route::get('/departments', [DepartmentController::class, 'index']);
    Route::post('/departments', [DepartmentController::class, 'store']);
    Route::get('/departments/{department}', [DepartmentController::class, 'show']);
    Route::put('/departments/{department}', [DepartmentController::class, 'update']);
    Route::DELETE('/departments/{department}', [DepartmentController::class, 'destroy']);
   
    Route::get('departments-search/{search}', [DepartmentController::class, 'searchDepartment']);
 
 //}); 