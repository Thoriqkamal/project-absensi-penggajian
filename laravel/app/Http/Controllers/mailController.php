<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Penggajian;
use App\RekapAbsen;
use App\Laporan;
use DB;
use App\Mail\MyEmail;
class mailController extends Controller
{
    public function sendEmail($route){

        //rekap_absen
        if($route == 'rekap_absen'){
            $data = RekapAbsen::all();
            $title = "Rekap Absen";
        }elseif($route == 'laporan'){
            $data = Penggajian::select(
                'penggajians.id',
                'rekap_absens.nama',
                'rekap_absens.jumlah_tidak_hadir',
                'rekap_absens.potongan_perhari',
                'rekap_absens.jumlah_potongan',
                'penggajians.jumlah_gaji',
                DB::raw('penggajians.gaji_pokok')
                )
            ->leftJoin('rekap_absens', 'penggajians.id_rekap_absens', '=', 'rekap_absens.id')
            // ->leftJoin('rekap_absens', 'rekap_absens.id_absen', '=', 'absens.id')
            ->get();
            $title = 'Laporan Absen';
        }

        // dd($data);

        $details = [
            'title' => $title,
            'route' => $route,
            'data'  => $data
        ];

        // dd($details);

        Mail::to('puspitomelly@gmail.com')->send(new MyEmail($details));
        // Mail::to('thoriqkamal18@gmail.com')->send(new MyEmail($details));
        return redirect()->back()->with('success', 'Email Berhasil Dikirim !!');

    }
}
