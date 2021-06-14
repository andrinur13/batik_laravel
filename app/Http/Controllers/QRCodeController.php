<?php

namespace App\Http\Controllers;

use App\Models\PaguyubanModel;
use App\Models\PembatikModel;
use App\Models\BatikModel;
use App\Models\QRCodeModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    //
    public function index()
    {
        $dataPaguyuban = PaguyubanModel::get()->toArray();
        $dataPembatik = PembatikModel::get()->toArray();
        $dataBatik = BatikModel::get()->toArray();
        $qrcode = QRCodeModel::get()->toArray();

        return view('dashboard/qrcode/index', [
            'paguyuban' => $dataPaguyuban,
            'pembatik' => $dataPembatik,
            'batik' => $dataBatik,
            'qrcode' => $qrcode
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'motif_batik' => ['required'],
            'nama_paguyuban' => ['required'],
            'nama_pembatik' => ['required'],
            'pewarnaan' => ['required']
        ]);

        $code_template = "P.N.DIY";
        $code_from_input = $request->motif_batik . '.' . $request->nama_paguyuban . '.' . $request->nama_pembatik . '.' . $request->pewarnaan . '-' . time();
        $code_for_qr = $code_template . '.' . $code_from_input;
        $fileIMG = $request->file('foto_batik');
        $pathQRCode = 'qrcodes/' . $code_for_qr . '.png';

        QrCode::format('png')->size(500)->generate($code_for_qr, '../public/' . $pathQRCode);
        $pathFoto = 'img/' . $fileIMG->getClientOriginalName() . '-' . time() . '.' . $fileIMG->getClientOriginalExtension();

        $fileIMG->move('../public/img/', '../public/' . $pathFoto);

        QRCodeModel::insert([
            'qrcode' => $code_for_qr,
            'path_qrcode' => $pathQRCode,
            'path_img' => $pathFoto,
            'grade' => $request->grade,
            'deskripsi' => $request->deskripsibatik
        ]);


        return redirect('dashboard/qrcode');
    }

    public function download($id)
    {

        $query = QRCodeModel::where(['id' => $id])->get()->toArray();
        $file = $query[0]['path_qrcode'];

        // dd($file);

        return response()->download($file);
    }

    public function fetchCode($qr)
    {
        $qrModel = new QRCodeModel();
        $query = $qrModel->where(['qrcode' => $qr])->get()->toArray();

        if ($query == null) {
            return response()->json([
                'status' => 'failed',
                'code' => 404,
                'messages' => 'qrcode not found!'
            ], 404);
        }

        $data = explode(".", $query[0]['qrcode']);
        $terakhir = explode("-", $data[6]);
        $terakhir = $terakhir[0];
        $data[6] = $terakhir;
        // query data
        // ambil paguyuban
        $paguyubanQuery = PaguyubanModel::where(['kode' => $data[4]])->get()->toArray();
        // ambil data anggota pembatik
        $pembatikQuery = PembatikModel::where(['kode_paguyuban' => $data[4], 'kode_pembatik' => $data[5]])->get()->toArray();
        // ambil data motif
        if ($data[3] == '00') {
            $motifQuery[0]['nama_batik'] = 'Kombinasi';
        } else {
            $motifQuery = BatikModel::where(['kode' => $data[3]])->get()->toArray();
        }
        // ambil data pewarnaan
        if ($data[6] == 'EX') {
            $pewarnaanQuery[0]['nama_pembatik'] = 'Eksternal';
        } else {
            $pewarnaanQuery = PembatikModel::where(['pewarna' => 1, 'kode_paguyuban' => $data[4], 'kode_pembatik' => $data[6]])->get()->toArray();
        }

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'data' => [
                'img_url' => $query[0]['path_img'],
                'qr_url' => $query[0]['path_qrcode'],
                'paguyuban' => $paguyubanQuery[0]['nama_paguyuban'],
                'nama_pembatik' => $pembatikQuery[0]['nama_pembatik'],
                'motif' => $motifQuery[0]['nama_batik'],
                'pewarnaan' => $pewarnaanQuery[0]['nama_pembatik'],
                'grade' => $query[0]['grade'],
                'deskripsi' => $query[0]['deskripsi']
            ]
        ]);
    }
}
