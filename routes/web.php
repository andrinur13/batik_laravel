<?php

use App\Http\Controllers\BatikController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PaguyubanController;
use App\Http\Controllers\PembatikController;
use App\Http\Controllers\PewarnaanController;
use App\Http\Controllers\QRCodeController;
use App\Imports\BatikImport;
use Maatwebsite\Excel\Facades\Excel;

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

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index']);

// paguyuban
Route::get('/dashboard/paguyuban', [PaguyubanController::class, 'index']);
Route::post('/dashboard/paguyuban/store', [PaguyubanController::class, 'store']);
Route::get('/dashboard/paguyuban/delete/{id}', [PaguyubanController::class, 'delete']);

// pembatik
Route::get('/dashboard/pembatik', [PembatikController::class, 'index']);
Route::post('/dashboard/pembatik/store', [PembatikController::class, 'store']);
Route::get('/dashboard/pembatik/delete/{id}', [PembatikController::class, 'delete']);

// batik
Route::get('/dashboard/batik', [BatikController::class, 'index']);

// pewarnaan
Route::get('dashboard/pewarnaan', [PewarnaanController::class, 'index']);

// qrcode
Route::get('dashboard/qrcode/', [QRCodeController::class, 'index']);
Route::post('dashboard/qrcode/store', [QRCodeController::class, 'store']);
Route::get('dashboard/qrcode/download/{id}', [QRCodeController::class, 'download']);

// file
Route::get('file', [FileController::class, 'index']);
Route::post('file/upload', [FileController::class, 'upload']);
Route::get('file/paguyuban', [FileController::class, 'dataPaguyuban']);
Route::get('file/pembatik', [FileController::class, 'dataPembatik']);
Route::get('file/batik', [FileController::class, 'dataBatik']);

Route::fallback(function() {
    return view('error/index');
});