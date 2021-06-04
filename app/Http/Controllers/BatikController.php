<?php

namespace App\Http\Controllers;

use App\Models\BatikModel;
use Illuminate\Http\Request;

class BatikController extends Controller
{
    //
    public function index() {
        $dataBatik = BatikModel::get()->toArray();
        
        return view('dashboard/batik/index', ['batik' => $dataBatik]);
    }
}
