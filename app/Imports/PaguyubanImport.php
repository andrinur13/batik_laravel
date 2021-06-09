<?php

namespace App\Imports;

use App\Models\PaguyubanModel;
use Maatwebsite\Excel\Concerns\ToModel;

class PaguyubanImport implements ToModel
{
    /**
    */
    public function model(array $row)
    {
        return new PaguyubanModel([
            //
            'nama_paguyuban' => $row[0],
            'kode' => $row[1]
        ]);
    }
}
