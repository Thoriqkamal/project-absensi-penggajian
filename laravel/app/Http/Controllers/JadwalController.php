<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;
use App\RekapAbsen;
use DB;

class JadwalController extends Controller
{
    public function index()
    {
        $data = Jadwal::all();
        return view('pages.jadwal', compact('data'));
    }

    public function create(Request $request)
    {
        $data = Jadwal::create([
            'nama'               => $request->nama,
            'jadwal'             => $request->jadwal,
            'Gaji'               => $request->gaji
        ]);
        // $data2 = RekapAbsen::create([
        //     'Gaji'               => $request->gaji
        // ]);
        return redirect('/jadwal')->with('status', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $getData = Jadwal::Find($id);

        return view('pages.jadwal', ['getData' => $getData]);
    }

    public function update(Request $request)
    {

        $data_update = DB::table('jadwals')
        ->where('jadwals.id', $request->id2)
        ->update([
            'nama'               => $request->nama2,
            'jadwal'             => $request->jadwal2
        ]);
        return redirect('/jadwal')->with('status', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        $data = DB::table('jadwals')
        ->where('id', $id)
        ->delete();

        return redirect('/jadwal')->with('status', 'Data Berhasil Dihapus');
    }

}
