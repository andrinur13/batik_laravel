<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaguyubanController;
use App\Http\Controllers\PembatikController;

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
    return view('welcome');
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