<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RekapAbsen;
use App\Absen;
use App\Penggajian;
use App\Imports\RekapAbsensImport;
use DB;
use Excel;

class RekapAbsenController extends Controller
{
    public function index()
    {
        // $data = Absen::select(
        //     'absens.id',
        //     'absens.id_jadwals',
        //     'absens.jumlah_tidak_hadir',
        //     'rekap_absens.jumlah_cuti',
        //     'jadwals.nama',
        //     'rekap_absens.potongan_perhari',
        //     'rekap_absens.jumlah_potongan'
        // )
        // ->leftjoin('rekap_absens', 'absens.id', '=', 'rekap_absens.id_absen')
        // ->leftjoin('jadwals', 'absens.id_jadwals', '=', 'jadwals.id')
        // ->get();
        $data = RekapAbsen::all();

        return view('pages.rekap_absen', compact('data'));
    }

    public function storeData(Request $request)
    {
        //VALIDASI
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file'); //GET FILE
            Excel::import(new RekapAbsensImport, $file); //IMPORT FILE
            return redirect()->back()->with(['success' => 'Upload success']);
        }
        return redirect()->back()->with(['error' => 'Please choose file before']);
    }

    public function create(Request $request)
    {
        $data = RekapAbsen::create([
            'nama' => $request->nama,
            'jumlah_cuti' => $request->jumlah_cuti,
            'jumlah_tidak_hadir' => $request->jumlah_tidak_hadir,
            'potongan_perhari' => $request->potongan_perhari,
            'jumlah_potongan' => $request->jumlah_potongan
        ]);
        $data_penggajian = Penggajian::create([
            'id_rekap_absens' => $data->id,
            'jumlah_tidak_hadir' => $data->jumlah_tidak_hadir,
            'potongan_perhari' => $data->potongan_perhari,
            'jumlah_potongan' => $request->jumlah_potongan
        ]);
        return redirect('/rekap_absen')->with('status', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $getData = RekapAbsen::FindOrFail($id);
        return $getData;
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $jumlah_tidak_hadir = RekapAbsen::select('jumlah_tidak_hadir')->where('id_absen', '=', $request->id)->first();
        // dd($jumlah_tidak_hadir);
        // dd($getData);

        if($request->jumlah_cuti == null){
            $jumlah_cuti = 0;
        }else{
            $jumlah_cuti = $request->jumlah_cuti;
        }

        if($request->potongan_perhari == null){
            $potongan_perhari = 0;
        }else{
            $potongan_perhari = $request->potongan_perhari;
        }

        if($request->jumlah_tidak_hadir == null){
            $jumlah_tidak_hadir = 0;
        }else{
            $jumlah_tidak_hadir = $request->jumlah_tidak_hadir;
        }

        $jumlah_tidak_hadir = $request->jumlah_tidak_hadir;
        $potongan_perhari   = $request->potongan_perhari;

        if($request->jumlah_potongan != null){
            $jumlah_potongan = $jumlah_tidak_hadir * $potongan_perhari;
        }else{
            $jumlah_potongan = 0;
        }
        // dd($jumlah_potongan);

        $data_update = DB::table('rekap_absens')
        ->where('rekap_absens.id_absen', $request->id)
        ->update([
            'jumlah_cuti'          => $jumlah_cuti,
            'potongan_perhari'     => $potongan_perhari,
            'jumlah_potongan'      => $jumlah_potongan
        ]);
        return redirect('/rekap_absen')->with('status', 'Data Berhasil Diubah');
    }
}
