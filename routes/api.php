<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

// url : /api/v1
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function () {
    Route::post('create', 'AuthController@create');
    Route::post('login', 'AuthController@login');

    Route::apiResource('services', ServiceController::class)->middleware('auth:sanctum');
    Route::apiResource('subservices', SubserviceController::class)->middleware('auth:sanctum');
    Route::apiResource('equipment', EquipmentController::class)->middleware('auth:sanctum');
    Route::apiResource('blog', BlogController::class)->middleware('auth:sanctum');

    Route::post('services/bulk', ['uses' => 'ServiceController@bulkStore']);
});
