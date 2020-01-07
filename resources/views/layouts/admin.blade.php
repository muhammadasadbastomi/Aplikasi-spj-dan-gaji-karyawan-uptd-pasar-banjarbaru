
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin/assets/images/favicon.png')}}">
    <title>Aplikasi SPJ dan gajih Karyawan</title>
    <link href="{{asset('admin/assets/libs/flot/css/float-chart.css')}}" rel="stylesheet">
    <link href="{{asset('admin/dist/css/style.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
   
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper">
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <a class="navbar-brand" href="{{Route('beranda')}}">
                        <b class="logo-icon p-l-10">
                            <img src="{{asset('img/logo.png')}}"  width="30" style="margin-top:0px;" alt="homepage" class="light-logo" />
                        </b>
                        <span class="logo-text">
                             UPT Pasar
                        </span>
                    </a>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                    </ul>
                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="font-24 mdi mdi-comment-processing"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown" aria-labelledby="2">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="">
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-success btn-circle"><i class="ti-calendar"></i></span>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">Event today</h5> 
                                                        <span class="mail-desc">Just a reminder that event</span> 
                                                    </div>
                                                </div>
                                            </a>

                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-danger btn-circle"><i class="fa fa-link"></i></span>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">Luanch Admin</h5> 
                                                        <span class="mail-desc">Just see the my new admin!</span> 
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('admin/assets/images/users/1.jpg')}}" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> Nama Admin</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                <div class="dropdown-divider"></div>
                                <div class="p-l-30 p-10"><a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded">View Profile</a></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{Route('beranda')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Beranda</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-database"></i><span class="hide-menu">Master Data </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="{{Route('golonganIndex')}}" class="sidebar-link"><i class="mdi mdi-table-edit"></i><span class="hide-menu"> Data Golongan </span></a></li>
                                <li class="sidebar-item"><a href="{{Route('jabatanIndex')}}" class="sidebar-link"><i class="mdi mdi-table-edit"></i><span class="hide-menu"> Data Jabatan </span></a></li>
                                <li class="sidebar-item"><a href="{{Route('pajakIndex')}}" class="sidebar-link"><i class="mdi mdi-table-edit"></i><span class="hide-menu"> Data Pajak </span></a></li>
                                <li class="sidebar-item"><a href="{{Route('pegawaiIndex')}}" class="sidebar-link"><i class="mdi mdi-table-edit"></i><span class="hide-menu"> Data Pegawai </span></a></li>
                                <li class="sidebar-item"><a href="{{Route('standardHargaIndex')}}" class="sidebar-link"><i class="mdi mdi-table-edit"></i><span class="hide-menu"> Standard Harga </span></a></li>
                                <li class="sidebar-item"><a href="{{Route('jenisKendaraanIndex')}}" class="sidebar-link"><i class="mdi mdi-table-edit"></i><span class="hide-menu"> Data Jenis Kendaraan </span></a></li>
                                <li class="sidebar-item"><a href="{{Route('kendaraanIndex')}}" class="sidebar-link"><i class="mdi mdi-table-edit"></i><span class="hide-menu"> Data Kendaraan </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-move-resize-variant"></i><span class="hide-menu">Pencairan </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="{{Route('pencairanAdd')}}" class="sidebar-link"><i class="mdi mdi-border-color"></i><span class="hide-menu"> buat Pencairan </span></a></li>
                                <li class="sidebar-item"><a href="{{Route('pencairanIndex')}}" class="sidebar-link"><i class="mdi mdi-table-edit"></i><span class="hide-menu"> Data Pencairan </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-settings-variant"></i><span class="hide-menu">Manajemen PPTK </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="{{Route('pptkIndex')}}" class="sidebar-link"><i class="mdi mdi-account-card-details"></i><span class="hide-menu"> Data PPTK </span></a></li>
                                <li class="sidebar-item"><a href="{{Route('userIndex')}}" class="sidebar-link"><i class="mdi mdi-account-card-details"></i><span class="hide-menu"> Data User </span></a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        @yield('content')
        <footer class="footer text-center">
                All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
        </div>
    </div>
    <script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" defer ></script>
    <script src="{{asset('admin/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('admin/assets/extra-libs/sparkline/sparkline.js')}}"></script>
    <script src="{{asset('admin/dist/js/waves.js')}}"></script>
    <script src="{{asset('admin/dist/js/sidebarmenu.js')}}"></script>
    <script src="{{asset('admin/dist/js/custom.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/flot/excanvas.js')}}"></script>
    <script src="{{asset('admin/assets/libs/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('admin/assets/libs/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('admin/assets/libs/flot/jquery.flot.time.js')}}"></script>
    <script src="{{asset('admin/assets/libs/flot/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('admin/assets/libs/flot/jquery.flot.crosshair.js')}}"></script>
    <script src="{{asset('admin/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('admin/assets/extra-libs/multicheck/datatable-checkbox-init.js')}}"></script>
    <script src="{{asset('admin/assets/extra-libs/multicheck/jquery.multicheck.js')}}"></script>
    <script src="{{asset('admin/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
    <script src="{{asset('js/sweetalert/sweetalert.min.js') }}"></script>
@yield('script')   
</body>

</html>