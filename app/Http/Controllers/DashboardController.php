<?php

namespace App\Http\Controllers;

use App\Models\BatikModel;
use App\Models\PaguyubanModel;
use App\Models\PembatikModel;
use App\Models\QRCodeModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index() {
        $data = [
            'jumlah_pembatik' => PembatikModel::count(),
            'jumlah_motif' => BatikModel::count(),
            'jumlah_paguyuban' => PaguyubanModel::count(),
            'jumlah_kodefikasi' => QRCodeModel::count()
        ];
        return view('dashboard/index', $data);
    }
}
