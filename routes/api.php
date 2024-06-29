<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('employees', \App\Http\Controllers\Api\EmployeeController::class);
    Route::apiResource('position', \App\Http\Controllers\Api\PositionController::class);
    Route::apiResource('department', \App\Http\Controllers\Api\DepartmentController::class);
    Route::apiResource('bank', \App\Http\Controllers\Api\BankController::class);
    Route::apiResource('bank_branches', \App\Http\Controllers\Api\BankBranchController::class);

    Route::get('options/department', [\App\Http\Controllers\Api\OptionController::class, 'departments']);
    Route::get('/options', [\App\Http\Controllers\Api\OptionController::class, 'getOptions']);

    Route::post('attendances/bulk-add', [\App\Http\Controllers\Api\AttendanceController::class, 'bulkAdd']);
    Route::apiResource('attendances', \App\Http\Controllers\Api\AttendanceController::class)
        ->only(['index', 'store']);

    Route::post('/payroll', [\App\Http\Controllers\Api\PayrollController::class, 'store']);
});

Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);
