<?php

namespace App\Imports;

use App\Models\PembatikModel;
use Maatwebsite\Excel\Concerns\ToModel;

class PembatikImport implements ToModel
{
    /**
    */
    public function model(array $row)
    {
        return new PembatikModel([
            //
            'nama_pembatik' => $row[0],
            'kode_paguyuban' => $row[1],
            'kode_pembatik' => $row[2],
            'pewarna' => $row[3],
            'status' => $row[4]
        ]);
    }
}
