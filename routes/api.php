<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('/api/employee', [EmployeeController::class, 'findAll']);
Route::post('/api/employee', [EmployeeController::class, 'create']);
Route::put('/api/employee', [EmployeeController::class, 'update']);
Route::delete('/api/employee', [EmployeeController::class, 'delete']);

