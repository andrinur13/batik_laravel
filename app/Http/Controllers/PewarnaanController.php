<?php

namespace App\Http\Controllers;

use App\Models\PewarnaanModel;
use Illuminate\Http\Request;

class PewarnaanController extends Controller
{
    //
    public function index() {
        $dataPewarnaan = PewarnaanModel::get()->toArray();

        return view('dashboard/pewarnaan/index', ['pewarnaan' => $dataPewarnaan]);
    }
}
