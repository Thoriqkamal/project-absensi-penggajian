<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RekapAbsen;
use App\Absen;
use App\Jadwal;
use App\Penggajian;
use App\Laporan;
use DB;

class PenggajianController extends Controller
{
    //
    public function index(){
        $user = Penggajian::select(
            'penggajians.id',
            'rekap_absens.nama',
            'penggajians.jumlah_tidak_hadir',
            'penggajians.potongan_perhari',
            'penggajians.jumlah_potongan',
            'penggajians.jumlah_gaji',
            DB::raw('penggajians.gaji_pokok')
            )
        ->leftJoin('rekap_absens', 'penggajians.id_rekap_absens', '=', 'rekap_absens.id')
        // ->leftJoin('rekap_absens', 'rekap_absens.id_absen', '=', 'absens.id')
        ->get();
        // dd($user);

        return view('pages.penggajian', compact('user'));
    }
    public function edit($id)
    {
        $getData = Penggajian::FindOrFail($id);
        return $getData;
    }
    public function update(Request $request)
    {
        // dd($request->all());
        $rekap_absen_id = DB::table('rekap_absens')->where('nama', '=', $request->nama)->first();
        $data_update = DB::table('penggajians')
        ->where('penggajians.id', $request->id)
        ->update([
            'id_rekap_absens'      => $rekap_absen_id->id,
            'jumlah_tidak_hadir'   => $request->jumlah_tidak_hadir,
            'potongan_perhari'     => $request->potongan_perhari,
            'jumlah_potongan'      => $request->jumlah_potongan,
            'jumlah_gaji'          => $request->jumlah_gaji,
            'gaji_pokok'           => $request->gaji_pokok
        ]);
        return redirect('/penggajian')->with('status', 'Data Berhasil Diubah');
    }

    public function laporan(){
        $user = Penggajian::select(
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

        // dd($user);
        // $user = Laporan::all();
        return view('pages.laporan', compact('user'));
    }
}
