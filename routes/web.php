<?php

use App\Http\Controllers\BukuTamuController;
use App\Http\Controllers\SatisfactionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardLaporanController;
use App\Http\Controllers\DashboardPompaAirController;
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

Route::get('/posts', [PostController::class, 'index']);
Route::get('/skm', [SkmController::class, 'index']);
Route::get('/buku-tamu', [BukuTamuController::class, 'index']);
Route::get('/remove', [BukuTamuController::class, 'remove']);
Route::get('/kepuasan', [SatisfactionController::class, 'index']);
Route::get('/list/buku-tamu', [BukuTamuController::class, 'list']);
Route::resource('/kunjungan', BukuTamuController::class);
Route::resource('/simpan_survey', SkmController::class);
Route::post('/form/isi-survey', [BukuTamuController::class, 'isi_survey'])->name('isiSurvey');
//get SUb Jenis Layanan
Route::post('/data/subJenisLayanan', [BukuTamuController::class, 'subJenisLayanan'])->name('subJenisLayanan.post');
Route::post('/data/subJenisLayananskm', [SkmController::class, 'subJenisLayananskm'])->name('subJenisLayananskm.post');
//dengan model binding
Route::get('/posts/{post:slug}', [PostController::class, 'show']); //slug untuk identifkasi id kalau defaultnya id

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

Route::get('/push-notificaiton', [WebNotificationController::class, 'index'])->name('push-notificaiton');
Route::post('/store-token', [WebNotificationController::class, 'storeToken'])->name('store.token');
Route::post('/send-web-notification', [WebNotificationController::class, 'sendWebNotification'])->name('send.web-notification');
