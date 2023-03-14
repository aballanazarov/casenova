<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\BlogController;
use App\Http\Controllers\Api\V1\EquipmentController;
use App\Http\Controllers\Api\V1\GalleryController;
use App\Http\Controllers\Api\V1\ServiceController;
use App\Http\Controllers\Api\V1\SubserviceController;
use Illuminate\Support\Facades\Route;

// Without Authorization
// With Authorization
Route::prefix('v1')
//    ->middleware('auth:sanctum')
    ->group(function () {
        Route::post('login', [AuthController::class, 'login']);

        Route::get('services', [ServiceController::class, 'index']);
        Route::get('services/{service}', [ServiceController::class, 'show'])->whereNumber('service');

        Route::get('subservices', [SubserviceController::class, 'index']);
        Route::get('subservices/{subservice}', [SubserviceController::class, 'show'])->whereNumber('service');

        Route::get('equipment', [EquipmentController::class, 'index']);
        Route::get('equipment/{equipment}', [EquipmentController::class, 'show'])->whereNumber('service');

        Route::get('blog', [BlogController::class, 'index']);
        Route::get('blog/{blog}', [BlogController::class, 'show'])->whereNumber('service');

        Route::get('galleries', [GalleryController::class, 'index']);
        Route::get('galleries/{gallery}', [GalleryController::class, 'show'])->whereNumber('service');

        Route::prefix('admin')
            ->middleware('auth:sanctum')
            ->group(function () {
                Route::apiResource('services', ServiceController::class);
                Route::post('services/{service}/image', [ServiceController::class, 'image'])->whereNumber('service');

                Route::apiResource('subservices', SubserviceController::class);
                Route::post('subservices/{subservice}/image', [SubserviceController::class, 'image'])->whereNumber('subservice');

                Route::apiResource('equipment', EquipmentController::class);
                Route::post('equipment/{equipment}/image', [EquipmentController::class, 'image'])->whereNumber('equipment');

                Route::apiResource('blog', BlogController::class);
                Route::post('blog/{blog}/image', [BlogController::class, 'image'])->whereNumber('blog');

                Route::apiResource('galleries', GalleryController::class);
                Route::post('galleries/{gallery}/image', [GalleryController::class, 'image'])->whereNumber('gallery');
            });
    }
    );
