<?php

namespace App\Imports;

use App\RekapAbsen;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow; //TAMBAHKAN CODE INI


class RekapAbsensImport implements ToModel, WithHeadingRow // USE CLASS YANG DIIMPORT
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new RekapAbsen([
            'nama' => $row['nama'],
            'jumlah_cuti' => $row['jumlah_cuti'],
            'jumlah_tidak_hadir' => $row['jumlah_tidak_hadir'],
            'potongan_perhari' => $row['potongan_perhari'],
            'jumlah_potongan' => $row['jumlah_potongan'],
        ]);
    }
}
