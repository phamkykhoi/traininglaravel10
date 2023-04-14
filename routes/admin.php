<?php


use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;

Route::group([], function() {
    Route::resource('permission', PermissionController::class);
    Route::resource('role', RoleController::class);
});
