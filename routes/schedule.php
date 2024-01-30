<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ShiftController;
use \App\Http\Controllers\PositionController;
use \App\Http\Controllers\EmployeeController;
use \App\Http\Controllers\ScheduleController;
use \App\Http\Controllers\RoleController;
use \App\Http\Controllers\PermissionController;


Route::prefix('admin')->group(static function () {
    Route::middleware('auth')->group(function () {

        Route::get('/shift/list', [ShiftController::class, 'list'])->name('shift.json.list');
        Route::resource('/shift', ShiftController::class);

        Route::get('/position/list', [PositionController::class, 'list'])->name('position.json.list');
        Route::resource('/position', PositionController::class);

        Route::get('/employee/list', [EmployeeController::class, 'list'])->name('employee.json.list');
        Route::resource('/employee', EmployeeController::class);

        Route::get('/schedule/list', [ScheduleController::class, 'list'])->name('schedule.json.list');
        Route::resource('/schedule', ScheduleController::class);

        Route::get('/permission', [PermissionController::class, 'index'])->name('permission.index');
        Route::get('/role', [RoleController::class, 'index'])->name('role.index');

    });
});
