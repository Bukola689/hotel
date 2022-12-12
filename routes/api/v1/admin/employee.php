<?php

use App\Http\Controllers\V1\Admin\EmployeeController;

use Illuminate\Support\Facades\Route;

//Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {

    Route::get('/employees', [EmployeeController::class, 'index']);
    Route::post('/employees', [EmployeeController::class, 'store']);
    Route::get('/employees/{employee}', [EmployeeController::class, 'show']);
    Route::put('/employees/{employee}', [EmployeeController::class, 'update']);
    Route::DELETE('/employees/{employee}', [EmployeeController::class, 'destroy']);

    Route::get('employees-search/{search}', [EmployeeController::class, 'searchEmployee']);
   
 
 //}); 