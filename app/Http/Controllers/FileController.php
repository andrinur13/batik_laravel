<?php

namespace App\Http\Controllers;

use App\Imports\BatikImport;
use App\Imports\PaguyubanImport;
use App\Imports\PembatikImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FileController extends Controller
{
    //

    public function index() {
        return view('file/index');
    }

    public function upload(Request $req) {
        $pilihan = $req->pilihan;

        if($pilihan == 'paguyuban') {
            $file = $req->file('file');
            $file->move('fileexcel', 'paguyuban.xlsx');
            return redirect('file/paguyuban');
        } else if($pilihan == 'pembatik') {
            $file = $req->file('file');
            $file->move('fileexcel', 'pembatik.xlsx');
            return redirect('file/pembatik');
        } else if($pilihan == 'batik') {
            $file = $req->file('file');
            $file->move('fileexcel', 'batik.xlsx');
            return redirect('file/batik');
        }
    }

    public function dataBatik() {
        Excel::import(new BatikImport, 'fileexcel/batik.xlsx');
        return redirect('file');
    }

    public function dataPaguyuban() {
        Excel::import(new PaguyubanImport, 'fileexcel/paguyuban.xlsx');
        return redirect('file');
    }

    public function dataPembatik() {
        Excel::import(new PembatikImport, 'fileexcel/pembatik.xlsx');
        return redirect('file');
    }
}
