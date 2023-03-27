<?php

use App\Http\Controllers\Api\V1\BlogController;
use App\Http\Controllers\Api\V1\EquipmentController;
use App\Http\Controllers\Api\V1\GalleryController;
use App\Http\Controllers\Api\V1\ServiceController;
use App\Http\Controllers\Api\V1\SubserviceController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')
    ->group(function () {
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
    });
