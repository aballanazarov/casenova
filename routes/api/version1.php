<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\BlogController;
use App\Http\Controllers\Api\V1\EquipmentController;
use App\Http\Controllers\Api\V1\ServiceController;
use App\Http\Controllers\Api\V1\SubserviceController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')
    //->middleware('auth:sanctum')
    ->group(function () {
        Route::post('create', [AuthController::class, 'create']);
        Route::post('login', [AuthController::class, 'login']);

        Route::apiResource('services', ServiceController::class);
        Route::post('services/{service}/image', [ServiceController::class, 'image'])->whereNumber('service');

        Route::apiResource('subservices', SubserviceController::class);
        Route::post('subservices/{subservice}/image', [SubserviceController::class, 'image'])->whereNumber('subservice');

        Route::apiResource('equipment', EquipmentController::class);
        Route::post('equipment/{equipment}/image', [EquipmentController::class, 'image'])->whereNumber('equipment');

        Route::apiResource('blog', BlogController::class);
        Route::post('blog/{blog}/image', [BlogController::class, 'image'])->whereNumber('blog');
    }
);
