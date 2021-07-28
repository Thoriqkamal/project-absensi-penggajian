@extends('layouts.main')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Penggajian</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jumlah Tidak Hadir</th>
                        <th>Potongan Per Hari</th>
                        <th>Jumlah Potongan</th>
                        <th>Gaji Pokok</th>
                        <th>Jumlah Gaji</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jumlah Tidak Hadir</th>
                        <th>Potongan Per Hari</th>
                        <th>Jumlah Potongan</th>
                        <th>Gaji Pokok</th>
                        <th>Jumlah Gaji</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php //dd($user);?>
                    @foreach($user as $key => $value)
                    <tr class="text-center">
                        <td>{{$key+1}}</td>
                        <td>{{$value->nama}}</td>
                        <td>{{!empty($value->jumlah_tidak_hadir)?$value->jumlah_tidak_hadir:0}}</td>
                        <td>Rp. {{!empty($value->potongan_perhari)?$value->potongan_perhari:0}}</td>
                        <td>Rp. {{!empty($value->jumlah_potongan)?$value->jumlah_potongan:0}}</td>
                        <td>Rp. {{!empty($value->gaji_pokok)?$value->gaji_pokok:0}}</td>
                        <td>Rp. {{!empty($value->jumlah_gaji)?$value->jumlah_gaji:0}}</td>
                        <td><a href="penggajian/edit/{{$value->id}}" data-id="{{$value->id}}" data-nama="{{$value->nama}}" data-jumlah_tidak_hadir="{{$value->jumlah_tidak_hadir}}" data-potongan_perhari="{{$value->potongan_perhari}}" data-jumlah_potongan="{{$value->jumlah_potongan}}" data-gaji_pokok="{{$value->gaji_pokok}}" data-jumlah_gaji="{{$value->jumlah_gaji}}" class="btn btn-primary btn-icon-split btn-sm edit" data-toggle="modal" data-target="#edit-penggajian"><span class="icon text-white-50"><i class="fas fa-pen"></i></span><span class="text">Edit</span></a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade edit-penggajian" id="edit-penggajian" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Penggajian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="post" action="{{url('penggajian/update')}}">
                {{ csrf_field() }}
                <input type="hidden" name="id" id="idPenggajian" placeholder="Masukkan Nama">

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
                </div>

                <div class="form-group JumlahTidakHadir">
                    <label for="tanggal_hadir2">Jumlah Tidak Hadir</label>
                    <input type="number" class="form-control" name="jumlah_tidak_hadir" id="jumlah_tidak_hadir" placeholder="Masukkan Jumlah Tidak Hadir">
                </div>

                <div class="form-group PotonganPerhari">
                    <label for="password">Potongan Perhari</label>
                    <input type="amount" class="form-control" name="potongan_perhari" id="potongan_perhari" placeholder="Masukkan Potongan Perhari">
                </div>

                <div class="form-group">
                    <label for="password">Jumlah Potongan</label>
                    <input type="amount" class="form-control" name="jumlah_potongan" id="jumlah_potongan" placeholder="Masukkan Jumlah Potongan">
                </div>

                <div class="form-group">
                    <label for="password">Gaji Pokok</label>
                    <input type="amount" class="form-control" name="gaji_pokok" id="gaji_pokok" placeholder="Masukkan Jumlah Gaji Pokok">
                </div>

                <div class="form-group">
                    <label for="password">Jumlah Gaji</label>
                    <input type="amount" class="form-control" name="jumlah_gaji" id="jumlah_gaji" placeholder="Masukkan Jumlah Gaji">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit">Save changes</button>
            </div>
            </form>
        </div>
    </div>
 </div>
@endsection
