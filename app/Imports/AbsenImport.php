<?php

namespace App\Imports;

use App\Absen;
use Maatwebsite\Excel\Concerns\ToModel;

class AbsenImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Absen([
            'nama' => $row[1],
            'tanggal_lahir' => $row[2],
            'jam_hadir' => $row[3],
            'jam_pulang' => $row[4],
            'jumlah_tidak_hadir' => $row[5],
        ]);
    }
}
