<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('/employee', [EmployeeController::class, 'findAll']);
Route::post('/employee', [EmployeeController::class, 'create']);
Route::put('/employee/{id}', [EmployeeController::class, 'update']);
Route::delete('/employee/{id}', [EmployeeController::class, 'delete']);

