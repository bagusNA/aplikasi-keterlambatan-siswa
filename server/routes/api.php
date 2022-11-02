<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PicketScheduleController;
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

Route::prefix('/v1')->group(function() {
    Route::controller(AuthController::class)->prefix('/auth')->group(function () {
        Route::post('/login', 'login');
        Route::post('/logout', 'logout');
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::controller(PicketScheduleController::class)->prefix('/picket-schedules')->group(function () {
            Route::get('/', 'show');
            Route::get('/{day}', 'detail');
            Route::post('/', 'create');
        });
    });
});
