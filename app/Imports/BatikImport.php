<?php

namespace App\Imports;

use App\Models\BatikModel;
use Maatwebsite\Excel\Concerns\ToModel;

class BatikImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new BatikModel([
            //
            'nama_batik' => $row[0],
            'kode' => $row[1],
            'filosofi' => $row[2]
        ]);
    }
}
