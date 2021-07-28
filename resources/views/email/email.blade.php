<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Custom styles for this template-->
    <style>
        #dataTable{
            border-collapse: collapse;
        }

        #dataTable tr td, #dataTable tr th{
            padding:10px;
            text-align:center;
        }
        h1{
            text-align:center;
            margin:0px auto;
        }
    </style>

</head>
<body>
    <h2>{{$details['title']}}</h2>
    @if($details['route'] == 'rekap_absen')
        <table border="1" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jumlah Cuti</th>
                    <th>Jumlah Tidak Hadir</th>
                    <th>Potongan Perhari</th>
                    <th>Jumlah Potongan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($details['data'] as $key => $value)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$value['nama']}}</td>
                        <td>{{$value['jumlah_cuti']}}</td>
                        <td>{{$value['jumlah_tidak_hadir']}}</td>
                        <td>{{$value['potongan_perhari']}}</td>
                        <td>{{$value['jumlah_potongan']}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @elseif($details['route'] == 'laporan')
        <table border="1" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Gaji Pokok</th>
                    <th>Potongan</th>
                    <th>Gaji Yang diterima</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($details['data'] as $key => $value)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$value['nama']}}</td>
                        <td>{{$value['gaji_pokok']}}</td>
                        <td>{{$value['jumlah_potongan']}}</td>
                        <td>{{$value['jumlah_gaji']}}</td>
                        <td>Karyawan Tetap</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    

</body>
</html>