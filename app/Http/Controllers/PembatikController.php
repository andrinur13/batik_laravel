<?php

namespace App\Http\Controllers;

use App\Models\PaguyubanModel;
use App\Models\PembatikModel;
use Illuminate\Http\Request;

class PembatikController extends Controller
{
    //
    public function index()
    {
        $dataPembatik = PembatikModel::get()->toArray();
        $dataPaguyuban = PaguyubanModel::get()->toArray();
        return view('pembatik/index', ['pembatik' => $dataPembatik, 'paguyuban' => $dataPaguyuban]);
    }

    public function store(Request $request)
    {
        PembatikModel::insert([
            'nama_pembatik' => $request->nama_pembatik,
            'kode_paguyuban' => $request->kode_paguyuban,
            'kode_pembatik' => $request->kode_pembatik,
            'status' => 'aktif'
        ]);

        return redirect('/dashboard/pembatik');
    }

    public function delete($id) {
        PembatikModel::where(['id' => $id])->delete();

        return redirect('/dashboard/pembatik');
    }
}
