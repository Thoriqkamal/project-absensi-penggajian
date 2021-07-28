@extends('layouts.main')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Laporan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Gaji Pokok</th>
                        <th>Potongan</th>
                        <th>Gaji Yang Diterima</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Gaji Pokok</th>
                        <th>Potongan</th>
                        <th>Gaji Yang Diterima</th>
                        <th>Keterangan</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php //dd($user);?>
                    @foreach($user as $key => $value)
                    <tr>
                        <td>{{$value->nama}}</td>
                        <td>Rp. {{!empty($value->gaji_pokok)?$value->gaji_pokok:0}}</td>
                        <td>Rp. {{$value->jumlah_potongan}}</td>
                        <td>Rp. {{$value->jumlah_gaji}}</td>
                        <td>Laporan Gaji Bulan ini</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
