<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaguyubanModel;
use App\Models\PembatikModel;
use App\Models\BatikModel;
use App\Models\PewarnaanModel;
use App\Models\QRCodeModel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    //
    public function index() {
        $dataPaguyuban = PaguyubanModel::get()->toArray();
        $dataPembatik = PembatikModel::get()->toArray();
        $dataBatik = BatikModel::get()->toArray();
        $dataPewarnaan = PewarnaanModel::get()->toArray();
        $qrcode = QRCodeModel::get()->toArray();

        return view('dashboard/qrcode/index', [
            'paguyuban' => $dataPaguyuban,
            'pembatik' => $dataPembatik,
            'batik' => $dataBatik,
            'pewarnaan' => $dataPewarnaan,
            'qrcode' => $qrcode
        ]);
    }
    
    public function store(Request $request) {
        dd($request->all());

        $code_template = "N.T.DIY";
        $code_from_input = $request->motif_batik . '.' . $request->pewarnaan . '.' . $request->nama_paguyuban . '.' . $request->nama_pembatik . '-' . time();
        $code_for_qr = $code_template . '.' . $code_from_input;
        $fileIMG = $request->file('foto_batik');
        $pathQRCode = '/' . 'qrcodes/' . $code_for_qr . '.svg';

        QrCode::size(100)->generate($code_for_qr, '../public' . $pathQRCode);
        $pathFoto = '/' . 'img/' . $fileIMG->getClientOriginalName() . '-' . time() . '.' . $fileIMG->getClientOriginalExtension();

        $fileIMG->move('../public/img', '../public' . $pathFoto);

        QRCodeModel::insert([
            'qrcode' => $code_for_qr,
            'path_qrcode' => $pathQRCode,
            'path_img' => $pathFoto
        ]);


        return redirect('dashboard/qrcode');
        
    }
}
