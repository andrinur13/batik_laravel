<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaguyubanModel;

class PaguyubanController extends Controller
{
    //
    public function index() {
        $dataPaguyuban = PaguyubanModel::get()->toArray();
        // dd($dataPaguyuban);
        return view('dashboard/paguyuban/index', ['paguyuban' => $dataPaguyuban]);
    }


    public function store(Request $request) {
        dd($request->all());
    }

    public function delete($id) {
        PaguyubanModel::where(['id' => $id])->delete();
        return redirect('/dashboard/paguyuban');
    }
}
