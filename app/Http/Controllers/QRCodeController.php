<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaguyubanModel;
use App\Models\PembatikModel;
use App\Models\BatikModel;
use App\Models\PewarnaanModel;

class QRCodeController extends Controller
{
    //
    public function index() {
        $dataPaguyuban = PaguyubanModel::get()->toArray();
        $dataPembatik = PembatikModel::get()->toArray();
        $dataBatik = BatikModel::get()->toArray();
        $dataPewarnaan = PewarnaanModel::get()->toArray();

        return view('dashboard/qrcode/index', [
            'paguyuban' => $dataPaguyuban,
            'pembatik' => $dataPembatik,
            'batik' => $dataBatik,
            'pewarnaan' => $dataPewarnaan
        ]);
    }
    
    public function store(Request $request) {
        $code_template = "N.T.DIY";
        $code_from_input = $request->motif_batik . '.' . $request->pewarnaan . '.' . $request->nama_paguyuban . '.' . $request->nama_pembatik . '-' . time();
        $code_for_qr = $code_template . '.' . $code_from_input;
        // dd($request->all());
        dd($code_for_qr);
    }
}
