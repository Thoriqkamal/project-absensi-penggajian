@extends('layouts.main')

@section('content')
<div class="page-title-actions">
    <div class="d-inline-block dropdown" style="float: right">
        <a href="#" class="btn btn-primary btn-icon-split btn-sm cetak mb-2" data-toggle="modal" data-target=".create-absen">
            <span class="icon text-white-50">
            <i class="fas fa-pen"></i>
            </span>
            <span class="text">Create Absen</span>
        </a>
    </div>
    <div class="clear" style="clear: both"></div>
</div>
@if (\Session::has('status'))
<div class="alert alert-success">
    {{ \Session::get('status') }}
</div>
@endif

<head>
<title>Import Excel Ke Database Dengan Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>


		{{-- notifikasi form validasi --}}
		@if ($errors->has('file'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('file') }}</strong>
		</span>
        @endif

        {{-- notifikasi sukses --}}
		@if ($sukses = Session::get('sukses'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>{{ $sukses }}</strong>
		</div>
        @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Absen</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal hadir</th>
                            <th>Jam Hadir</th>
                            <th>Jam Pulang</th>
                            <th>Jumlah Tidak Hadir</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                         $counter = 0;
                        @endphp
                        @foreach ($data as $key => $data_absen)
                        <tr class="text-center">
                            <td>{{$counter+1}}</td>
                            <td>{{$data_absen->nama}}</td>
                            <td>{{$data_absen->tanggal_hadir}}</td>
                            <td>{{$data_absen->jam_hadir}}</td>
                            <td>{{$data_absen->jam_pulang}}</td>
                            <td>{{$data_absen->jumlah_tidak_hadir}}</td>
                        <td><a href="absen/edit/{{$data_absen->id}}" class="btn btn-info" data-id="{{$data_absen->id}}" data-absen="{{$data_absen->nama}}" data-tanggal_hadir="{{$data_absen->tanggal_hadir}}" data-jam_hadir="{{$data_absen->jam_hadir}}" data-jam_pulang="{{$data_absen->jam_pulang}}" data-jumlah_tidak_hadir="{{$data_absen->jumlah_tidak_hadir}}" data-toggle="modal" data-target="#edit-absen"><i class="fa fa-edit"></i></a>

                        <a href="absen/delete/{{ $data_absen->id }}" method="POST" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
                            {{method_field('DELETE')}}
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-primary" title="Delete"><i class="fa fa-trash"></i></button></a>
                        </tr>
                        @php
                        $counter++;
                       @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

     <!-- Modal Create Absen -->
    <div class="modal fade create-absen" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Absen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="post" action="{{url('absen/create')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        {{-- <input name="nama" class="nama-value" type="hidden"> --}}
                    {{-- <input type="text" name="nama" class="form-control inputName" id="inputName" placeholder="Masukkan Nama" autocomplete="off"> --}}
                    <select name="nama" class="form-control inputName" id="inputName" placeholder="Masukkan Nama" autocomplete="off">
                        <option value="">--choice--</option>
                        @foreach ($jadwal as $jd)
                            <option value="{{ $jd->id }}"> {{ $jd->nama}}</option>
                        @endforeach
                     </select>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_hadir">Tanggal Hadir</label>
                        <input type="date" class="form-control" name="tanggal_hadir" id="tanggal_hadir" placeholder="Masukkan Tanggal Hadir">
                    </div>

                    <div class="form-group">
                        <label for="jam_hadir">Jam Hadir</label>
                        <input type="time" class="form-control" name="jam_hadir" id="jam_hadir" placeholder="Masukkan Jam Hadir">
                    </div>

                    <div class="form-group">
                        <label for="jam_pulang">Jam Pulang</label>
                        <input type="time" class="form-control" name="jam_pulang" id="jam_pulang" placeholder="Masukkan Jam Pulang">
                    </div>

                    <div class="form-group">
                        <label for="jumlah_tidak_hadir">Jumlah Tidak Hadir</label>
                        <input type="text" class="form-control" name="jumlah_tidak_hadir" id="jumlah_tidak_hadir" placeholder="Masukkan Jumlah Tidak Hadir">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button  class="btn btn-primary" type="submit">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Absen -->
    <div class="modal fade edit-absen" id="edit-absen" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Absen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="post" action="{{url('absen/update')}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="id2" id="idAbsen" placeholder="Masukkan Nama">

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="name2" name="nama2" placeholder="Masukkan Nama">
                    </div>

                    <div class="form-group">
                        <label for="tanggal_hadir2">Tanggal Hadir</label>
                        <input type="date" class="form-control" name="tanggal_hadir2" id="tanggal_hadir2" placeholder="Masukkan Tanggal Hadir">
                    </div>

                    <div class="form-group">
                        <label for="jam_hadir">Jam Hadir</label>
                        <input type="time" class="form-control" name="jam_hadir2" id="jam_hadir2" placeholder="Masukkan Jam Hadir">
                    </div>

                    <div class="form-group">
                        <label for="password">Jam Pulang</label>
                        <input type="time" class="form-control" name="jam_pulang2" id="jam_pulang2" placeholder="Masukkan Jam Pulang">
                    </div>

                    <div class="form-group">
                        <label for="jam_hadir">Jumlah Tidak Hadir</label>
                        <input type="text" class="form-control" name="jumlah_tidak_hadir2" id="jumlah_tidak_hadir2" placeholder="Masukkan Jumlah Tidak Hadir">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button  class="btn btn-primary" type="submit">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    {{-- <!-- Import Excel -->
		<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/absen/import_excel" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">

							{{ csrf_field() }}

							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" name="file" required="required">
							</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
				</form>
			</div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> --}}

@endsection
