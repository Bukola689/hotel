<?php

use App\Http\Controllers\V1\Admin\SalaryController;

use Illuminate\Support\Facades\Route;

//Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {

    Route::get('/salaries', [SalaryController::class, 'index']);
    Route::post('/salaries', [SalaryController::class, 'store']);
    Route::get('/salaries/{salary}', [SalaryController::class, 'show']);
    Route::put('/salaries/{salary}', [SalaryController::class, 'update']);
    Route::DELETE('/salaries/{salary}', [SalaryController::class, 'destroy']);
    
    Route::get('salaries-search/{salary}', [SalaryController::class, 'searchSalary']);

    
 
 //}); 