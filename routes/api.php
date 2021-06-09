<?php

use App\Http\Controllers\PembatikController;
use App\Http\Controllers\QRCodeController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('pembatikpaguyuban/{kode}', [PembatikController::class, 'queryPembatikByPaguyuban']);
Route::get('pembatikpewarna/{kode}', [PembatikController::class, 'queryPembatikPewarna']);

// query untuk mobile
Route::get('fetchcode/{kode}', [QRCodeController::class, 'fetchCode']);