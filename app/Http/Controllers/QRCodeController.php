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

        $code_template = "N.T.DIY";
        $code_from_input = $request->nama_paguyuban . '.' . $request->nama_pembatik . '.' . $request->motif_batik . '.' . $request->pewarnaan . '-' . time();
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

    public function fetchCode($qr) {
        $qrModel = new QRCodeModel();
        $query = $qrModel->where(['qrcode' => $qr])->get()->toArray();

        if($query == null) {
            return response()->json([
                'status' => 'failed',
                'code' => 404,
                'messages' => 'qrcode not found!'
            ], 404);
        } else {
            $data = explode(".", $query[0]['qrcode']);
            $terakhir = explode("-", $data[6]);
            $terakhir = $terakhir[0];
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'data' => [$data, $terakhir]
            ]);
        }
    } 
}
