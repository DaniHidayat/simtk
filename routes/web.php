<?php

use App\Http\Controllers\BukuTamuController;
use App\Http\Controllers\SatisfactionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardLaporanController;
use App\Http\Controllers\DashboardPompaAirController;
use App\Http\Controllers\DashboardSaklarController;
use App\Http\Controllers\DashboardSensorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WebNotificationController;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'index']);

//daftar category
// Route::get('/categories', function () {
// 	return view('categories', [
// 		'title' => 'Post Categories',
// 		"active" => "Categories",
// 		'categories' => Category::all()
// 	]);
// });

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/dashboard/logout', [LoginController::class, 'logout']);

// Register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// User
Route::post('/user/update', [User::class, 'update']);

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard/skm', [DashboardController::class, 'skm'])->middleware('auth');
Route::get('/dashboard/sensor', [DashboardSensorController::class, 'index'])->middleware('auth');
Route::get('/dashboard/pompaair', [DashboardPompaAirController::class, 'index'])->middleware('auth');
Route::get('/dashboard/pompaair/checkstatus', [DashboardPompaAirController::class, 'checkStatus'])
    ->middleware('auth')
    ->name('checkstatus');
Route::post('/dashboard/pompaair/updateStatus', [DashboardPompaAirController::class, 'updateStatus'])
    ->middleware('auth')
    ->name('updateStatus');

Route::get('/home', function () {
	return redirect('/dashboard');
});

// Route::get('/statistik', function () {
// 	return view('statistik.index');
// })->middleware('guest');

// Laporan
Route::post('/dashboard/laporansensor/export_excel', [DashboardLaporanController::class, 'export_excel']);
Route::post('/dashboard/laporansensor/export_pdf', [DashboardLaporanController::class, 'export_pdf']);
Route::get('/dashboard/laporan', [DashboardLaporanController::class, 'index'])
->middleware('auth');

//saklar
Route::get('/dashboard/saklar', [DashboardSaklarController::class, 'index']);


Route::post('/save-token', [App\Http\Controllers\WebNotificationController::class, 'saveToken'])->name('save-token');
Route::post('/send-notification', [App\Http\Controllers\WebNotificationController::class, 'sendNotification'])->name('send.notification');
