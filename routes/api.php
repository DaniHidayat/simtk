<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardSensorController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

	Route::get('/simpan/sensor/{id}/{nilaiph}/{nilaimoisture}/{sensor_flowrate}/{sensor_waterpressure}', [DashboardSensorController::class, 'simpanSensor']);
	Route::get('/onoff/{id}', [DashboardSensorController::class, 'check']);
