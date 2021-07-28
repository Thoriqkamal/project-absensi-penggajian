@if(!session()->has('nama'))
{{session()->has('nama')}}
<script>window.location = "/";</script>
@endif
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>Absensi & Penggajian</title>

        <!-- Custom fonts for this template-->
        <link rel="icon" type="image/png" sizes="192x192" href="https://web-assets.manutd.com/dist/statics/android-icon-192x192.png">
        <link href="{{ asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('dist\css\datepicker.css')}}">

        <!-- Custom styles for this template-->
        <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet" />
        <link href="{{asset('css/custom.css')}}" rel="stylesheet" />
        <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
        <style>
            @media print {
                body * {
                    display:none;
                }

                body .printable {
                    display:block;
                }
            }
        </style>
    </head>



    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Menu Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Admin</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0" />

                <!-- Nav Item - Dashboard Penggajian Karyawan -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/')}}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Penggajian Karyawan</span>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider" />

                <!-- Heading -->
                <div class="sidebar-heading">
                    Menu
                </div>

                @if(session()->get('nama') == 'kasiekbang' || session()->get('nama') == 'admin')
                <!-- Menu jadwal -->
                <!-- <li id="jadwal" class="nav-item">
                    <a class="nav-link" href="{{ url('/jadwal') }}">
                        <i class="fas fa-fw fa-list"></i>
                        <span>Jadwal</span>
                    </a>
                </li> -->

                <!-- Menu Absen -->
                <!-- <li id="absen" class="nav-item">
                    <a class="nav-link" href="{{ url('/absen') }}">
                        <i class="fas fa-fw fa-user-check"></i>
                        <span>Absen</span>
                    </a>
                </li> -->

                <!-- Menu Rekap Absen -->
                <li id="rekap_absen" class="nav-item">
                    <a class="nav-link" href="{{ url('/rekap_absen') }}">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Rekap Absen</span>
                    </a>
                </li>
                @endif

                @if(session()->get('nama') == 'bendahara' || session()->get('nama') == 'admin')
                <!-- Menu Penggajian -->
                <li id="penggajian" class="nav-item">
                    <a class="nav-link" href="{{ url('/penggajian') }}">
                        <i class="fas fa-fw fa-dollar-sign"></i>
                        <span>Penggajian</span>
                    </a>
                </li>

                <!-- Menu Laporan -->
                <li id="laporan" class="nav-item">
                    <a class="nav-link" href="{{ url('/laporan') }}">
                        <i class="fas fa-fw fa-newspaper"></i>
                        <span>Laporan</span>
                    </a>
                </li>
                @endif

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block" />

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            </ul>
            <!-- End of Sidebar -->

            <!-- Main Content -->
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Search -->
                        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            <!-- Nav Item - Alerts -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell fa-fw"></i>
                                    <!-- Counter - Alerts -->
                                    <span class="badge badge-danger badge-counter">3+</span>
                                </a>
                                <!-- Dropdown - Alerts -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">
                                        Alerts Center
                                    </h6>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-primary">
                                                <i class="fas fa-file-alt text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">December 12, 2019</div>
                                            <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-success">
                                                <i class="fas fa-donate text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">December 7, 2019</div>
                                            $290.29 has been deposited into your account!
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-warning">
                                                <i class="fas fa-exclamation-triangle text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">December 2, 2019</div>
                                            Spending Alert: We've noticed unusually high spending for your account.
                                        </div>
                                    </a>
                                    <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                </div>
                            </li>

                            <!-- Nav Item - Messages -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-envelope fa-fw"></i>
                                    <!-- Counter - Messages -->
                                    <span class="badge badge-danger badge-counter">7</span>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                    <h6 class="dropdown-header">
                                        Message Center
                                    </h6>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="" />
                                            <div class="status-indicator bg-success"></div>
                                        </div>
                                        <div class="font-weight-bold">
                                            <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                                            <div class="small text-gray-500">Emily Fowler · 58m</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="" />
                                            <div class="status-indicator"></div>
                                        </div>
                                        <div>
                                            <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                                            <div class="small text-gray-500">Jae Chun · 1d</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="" />
                                            <div class="status-indicator bg-warning"></div>
                                        </div>
                                        <div>
                                            <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                                            <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="" />
                                            <div class="status-indicator bg-success"></div>
                                        </div>
                                        <div>
                                            <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                                            <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                                </div>
                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{session()->get('nama')}}</span>
                                    <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60" />
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Settings
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Activity Log
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                    <!-- /.container-fluid -->
                </div>

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Absensi Penggajian</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary logout" href="#">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css"  href="bootstrap-datepicker/css/bootstrap-datepicker.css"  rel="stylesheet">
        <script src="{{asset('dist\js\datepicker.js')}}"></script>
        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('vendor/jquery/jquery.min.js') }} "></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

        <!-- Page level plugins -->
        <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

        <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

        <script src="jquery/jquery-2.2.1.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

        <!-- Page level custom scripts -->
        <!-- <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script> -->


        <script>
            //Get data edit absen
                $("#edit-absen").on('show.bs.modal', function(event){
                    var button = $(event.relatedTarget);
                    var id = button.data('id');
                    var absen = button.data('absen')
                    var tanggal_hadir = button.data('tanggal_hadir')
                    var jam_hadir = button.data('jam_hadir')
                    var jam_pulang = button.data('jam_pulang')
                    var jumlah_tidak_hadir = button.data('jumlah_tidak_hadir')

                    var modal = $(this)
                    modal.find('.modal-body #idAbsen').val(id);
                    modal.find('.modal-body #name2').val(absen);
                    modal.find('.modal-body #tanggal_hadir2').val(tanggal_hadir);
                    modal.find('.modal-body #jam_hadir2').val(jam_hadir);
                    modal.find('.modal-body #jam_pulang2').val(jam_pulang);
                    modal.find('.modal-body #jumlah_tidak_hadir2').val(jumlah_tidak_hadir);
                })
                </script>

<script>
    //Get data edit Rekap-absen

                $("#edit-rekap-absen").on('show.bs.modal', function(event){
                    var button = $(event.relatedTarget)
                    var id = button.data('id')
                    var nama = button.data('nama')
                    var jumlah_cuti = button.data('jumlah_cuti')
                    var jumlah_tidak_hadir = button.data('jumlah_tidak_hadir')
                    var potongan = button.data('potongan')
                    var jumlah_potongan = button.data('jumlah_potongan')

                    var modal = $(this)
                    modal.find('.modal-body #idRekapAbsen').val(id);
                    modal.find('.modal-body #nama').val(nama);
                    modal.find('.modal-body #jumlah_cuti').val(jumlah_cuti);
                    modal.find('.modal-body #jumlah_tidak_hadir').val(jumlah_tidak_hadir);
                    modal.find('.modal-body #potongan_perhari').val(potongan);
                    modal.find('.modal-body #jumlah_potongan').val(jumlah_potongan);
                })
        </script>

                <script>
                //Get data edit Penggajian
                $("#edit-penggajian").on('show.bs.modal', function(event){
                    var button = $(event.relatedTarget)
                    var id = button.data('id')
                    var nama = button.data('nama')
                    var jumlah_tidak_hadir = button.data('jumlah_tidak_hadir')
                    var potongan = button.data('potongan_perhari')
                    var jumlah_potongan = button.data('jumlah_potongan')
                    var gaji_pokok = button.data('gaji_pokok')
                    var jumlah_gaji = button.data('jumlah_gaji')

                    var modal = $(this)
                    modal.find('.modal-body #idPenggajian').val(id);
                    modal.find('.modal-body #nama').val(nama);
                    modal.find('.modal-body #jumlah_tidak_hadir').val(jumlah_tidak_hadir);
                    modal.find('.modal-body #potongan_perhari').val(potongan);
                    modal.find('.modal-body #jumlah_potongan').val(jumlah_potongan);
                    modal.find('.modal-body #gaji_pokok').val(gaji_pokok);
                    modal.find('.modal-body #jumlah_gaji').val(jumlah_gaji);
                })
                </script>

        <script>
            //Get data edit jadwal
                $("#edit-jadwal").on('show.bs.modal', function(event){
                    var button = $(event.relatedTarget)
                    var id = button.data('id')
                    var nama = button.data('nama')
                    var jadwal = button.data('jadwal')

                    var modal = $(this)
                    modal.find('.modal-body #idJadwal').val(id);
                    modal.find('.modal-body #nama2').val(nama);
                    modal.find('.modal-body #jadwal2').val(jadwal);
                })
        </script>

        <script>
            window.addEventListener('DOMContentLoaded', (event) => {
                let nav = document.getElementsByClassName('nav-item');

                // Mendapatkan route belakang url
                let route_url = window.location.pathname;
                    route_url = route_url.replace('/', '');

                // ambil nav menu sesuai dengan route_url
                let menu = document.getElementById(`${route_url}`);

                // menambahkan kelas active sesuai route
                menu.classList.add('active');

                // ambil semua nav
                let menu_all = document.getElementsByClassName('nav-item');

                // convert menu_all ke array
                menu_all = Array.from(menu_all);

                menu_all.forEach((element)=>{

                    // Ketika Link nav menu di klik
                    element.addEventListener('click', (e)=>{
                    removeAllActiveClass(menu_all);
                    });

                });

                // Filter hanya page rekap absen dan laporan yang mempunyai fitur cetak dan kirim
                if(route_url == 'rekap_absen' || route_url == 'laporan'){
                    $('#dataTable').on('init.dt',()=>{
                        $('.div-cetak').html(
                            '<a href="#" class="btn btn-primary btn-icon-split btn-sm cetak">'+
                                '<span class="icon text-white-50">'+
                                '<i class="fas fa-print"></i>'+
                                '</span>'+
                                '<span class="text">Cetak</span>'+
                            '</a>'
                        );

                        $('.div-kirim').html(
                            '<a href="#" class="btn dropdown-toggle btn-sm btn-primary btn-icon-split kirim" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
                                '<span class="icon text-white-50">'+
                                    '<i class="fas fa-envelope"></i>'+
                                    '</span>'+
                                '<span class="text">Kirim</span>'+
                            '</a>'+
                            '<div class="dropdown-menu dropdown-menu-right  aria-labelledby="navbarDropdown">'+
                                `<a id="email" class="dropdown-item" href="{{url('/sendEmail/${route_url}')}}">Email</a>`+
                                '<a id="whatsapp" class="dropdown-item" href="https://api.whatsapp.com/send?phone=6281288621821&text=Teks">Whatsapp</a>'+
                            '</div>'
                        );

                        // if(route_url == 'rekap_absen'){
                        //     $('.div-edit').html(
                        //         '<a href="" class="btn btn-primary btn-icon-split btn-sm edit">'+
                        //             '<span class="icon text-white-50">'+
                        //             '<i class="fas fa-pen"></i>'+
                        //             '</span>'+
                        //             '<span class="text">Edit</span>'+
                        //         '</a>'
                        //     );
                        // }
                        var printDivCSS = new String ('<link href="{{asset("css/sb-admin-2.min.css")}}" rel="stylesheet" /><link href="{{asset("vendor/datatables/dataTables.bootstrap4.min.css")}}" rel="stylesheet">');

                        // Ketika tombol cetak di klik
                        let cetak = document.querySelector('.cetak');
                        cetak.onclick = (e)=>{
                            let datatable = document.querySelector('.table-print');
                            var WinPrint = window.open('', '', 'width=900,height=650');
                            WinPrint.document.write(printDivCSS + datatable.innerHTML);

                            setTimeout(() => {
                                WinPrint.document.close();
                                WinPrint.focus();
                                WinPrint.print();
                                WinPrint.close();
                            }, 1000);



                        }

                    }).DataTable( {
                        dom: "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'<'row'<'col-sm-12 col-md-6' <'row'<'col-sm-4 col-md-4'<'div-edit'>><'col-sm-4 col-md-4'<'div-cetak'>><'col-sm-4 col-md-4'<'div-kirim'>>>><'col-sm-12 col-md-6'f>>>>" + "<'row'<'col-sm-12 table-print'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>"
                    });
                }

                // <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
                if(route_url == 'absen'){
                    $('#dataTable').on('init.dt',()=>{
                        $('.div-cetak').html(
                            '<a href="#" class="btn btn-primary btn-icon-split btn-sm upload" data-toggle="modal" data-target="#importExcel">'+
                                '<span class="icon text-white-50">'+
                                '<i class="fas fa-upload"></i>'+
                                '</span>'+
                                '<span class="text">Upload</span>'+
                            '</a>'
                        );
                        var printDivCSS = new String ('<link href="{{asset("css/sb-admin-2.min.css")}}" rel="stylesheet" /><link href="{{asset("vendor/datatables/dataTables.bootstrap4.min.css")}}" rel="stylesheet">');

                        // Ketika tombol cetak di klik
                        // let cetak = document.querySelector('.cetak');
                        // cetak.onclick = (e)=>{
                        //     let datatable = document.querySelector('.table-print');
                        //     var WinPrint = window.open('', '', 'width=900,height=650');
                        //     WinPrint.document.write(printDivCSS + datatable.innerHTML);

                        //     setTimeout(() => {
                        //         WinPrint.document.close();
                        //         WinPrint.focus();
                        //         WinPrint.print();
                        //         WinPrint.close();
                        //     }, 1000);
                        // }

                    }).DataTable( {
                        dom: "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'<'row'<'col-sm-12 col-md-6' <'row'<'col-sm-4 col-md-4'<'div-edit'>><'col-sm-4 col-md-4'<'div-cetak'>><'col-sm-4 col-md-4'<'div-kirim'>>>><'col-sm-12 col-md-6'f>>>>" + "<'row'<'col-sm-12 table-print'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>"
                    });
                }

                //Menghilangkan alert success setelah mengirim email
                let notif_alert = document.querySelector('.alert-notif');

                if(notif_alert != null){
                    setInterval(function () {
                        if (!notif_alert.style.opacity) {
                            notif_alert.style.opacity = 1;
                        }
                        if (notif_alert.style.opacity > 0) {
                            notif_alert.style.opacity -= 0.01;
                        } else {
                            clearInterval();
                        }

                        if (notif_alert.style.opacity == 0) {
                            notif_alert.style.display = 'none';
                        }
                    }, 200);
                }

                // Ketika tombol logout di klik
                let logout = document.querySelector('.logout');
                logout.addEventListener('click', function(e){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type    : 'POST',
                        url     : "{{url('/ajax_logout')}}",
                        data    : {},
                        // dataType: 'json',
                        success: function(data){
                            console.log(data);
                            if(data.success == 1){
                                window.location.href="{{url('/')}}";
                            }

                        },
                        error: function(){
                            console.log('error');

                        }
                    });

                    e.preventDefault();
                });
            });
        </script>
        <script>
          // Fungsi Menghapus semua kelas yang mengandung 'active'
          function removeAllActiveClass(menu_all){
            menu_all.forEach((element)=>{
                  if(element.classList.contains('active')){
                    element.classList.remove('active');
                  }
              });

              return ;
          }
        </script>
    </body>
</html>
