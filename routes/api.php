<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonitoringController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/monitoring/latest', [MonitoringController::class, 'latest']);
Route::get('/monitoring/chart', [MonitoringController::class, 'getChartData']);
Route::apiResource('/monitorings', 'App\Http\Controllers\MonitoringController');
