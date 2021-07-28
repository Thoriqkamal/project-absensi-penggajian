@extends('layouts.main')

@section('content')
<div class="page-title-actions">
    <div class="d-inline-block dropdown" style="float: right">
        <a href="#" class="btn btn-primary btn-icon-split btn-sm cetak mb-2" data-toggle="modal" data-target=".create-jadwal">
            <span class="icon text-white-50">
            <i class="fas fa-pen"></i>
            </span>
            <span class="text">Create Jadwal</span>
        </a>
    </div>
    <div class="clear" style="clear: both"></div>
</div>
{{-- <div class="form-row">
<div class="col-2">
    <div class="form-group">
        <label>Bulan</label>
        <input type="month" class="form-control monthpicker datetimepicker-input" data-toggle="datetimepicker" data-target=".monthpicker" />
    </div>
</div> --}}
<div class="card shadow">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Jadwal</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered dt-responsive wrap" style="width:100%">
                <thead>
                    <tr>
                        <th rowspan="2" class="align-self-center">No</th>
                        <th rowspan="2" class="align-self-center">Nama</th>
                        <th colspan="32" class="text-center">Tanggal</th>
                    </tr>
                    <tr class="text-center">
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
                        <th>6</th>
                        <th>7</th>
                        <th>8</th>
                        <th>9</th>
                        <th>10</th>
                        <th>11</th>
                        <th>12</th>
                        <th>13</th>
                        <th>14</th>
                        <th>15</th>
                        <th>16</th>
                        <th>17</th>
                        <th>18</th>
                        <th>19</th>
                        <th>20</th>
                        <th>21</th>
                        <th>22</th>
                        <th>23</th>
                        <th>24</th>
                        <th>25</th>
                        <th>26</th>
                        <th>27</th>
                        <th>28</th>
                        <th>29</th>
                        <th>30</th>
                        <th>31</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $jadwal)
                    <tr class="text-center">
                        <td>{{$key+1}}</td>
                        <td>{{$jadwal->nama}}</td>
                        <td>{{$jadwal->jadwal}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><a href="absen/edit/{{$jadwal->id}}" class="btn btn-info" data-id="{{$jadwal->id}}" data-nama="{{$jadwal->nama}}" data-jadwal="{{$jadwal->jadwal}}" data-toggle="modal" data-target="#edit-jadwal"><i class="fa fa-edit"></i></a>
                        <a href="jadwal/delete/{{ $jadwal->id }}" method="POST" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
                            {{method_field('DELETE')}}
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-primary" title="Delete"><i class="fa fa-trash"></i></button></a>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
     <!-- Modal Create Jadwal -->
     <div class="modal fade create-jadwal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Jadwal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="post" action="{{url('jadwal/create')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control nama" id="nama" placeholder="Masukkan Nama" autocomplete="off">
                    <div id="namaList"></div>
                    </div>

                    <div class="form-group">
                        <label for="jadwal">Jadwal</label>
                        <input type="text" class="form-control" name="jadwal" id="jadwal" placeholder="Masukkan Jadwal">
                    </div>

                    <div class="form-group">
                        <label for="gaji">Gaji</label>
                        <input type="text" class="form-control" name="gaji" id="gaji" placeholder="Masukkan Gaji">
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

    <!-- Modal Edit Jadwal -->
    <div class="modal fade edit-jadwal" id="edit-jadwal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Jadwal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{url('jadwal/update')}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id2" id="idJadwal" placeholder="Masukkan Jadwal">
                    <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama2" class="form-control nama" id="nama2" placeholder="Masukkan Nama" autocomplete="off">
                    <div id="namaList"></div>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_hadir">Jadwal</label>
                        <input type="text" class="form-control jadwal" name="jadwal2" id="jadwal2" placeholder="Masukkan Jadwal">
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
@endsection
