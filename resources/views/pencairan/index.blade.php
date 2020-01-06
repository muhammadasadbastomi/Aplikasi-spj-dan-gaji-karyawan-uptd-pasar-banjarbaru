@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Data Pencairan</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
            <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Tabel Data Pencairan</h5>
                                <div class="text-right">
                                <a href="" class="btn btn-outline-info"><i class="mdi mdi-printer"></i> cetak Keseluruhan</a>
                                <a href="" class="btn btn-outline-info"><i class="mdi mdi-printer"></i> Filter cetak</a>
                                </div>
                                <br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Keperluan</th>
                                                <th>Bulan</th>
                                                <th>Total (Rp.)</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Keperluan</th>
                                                <th>Bulan</th>
                                                <th>Total (Rp.)</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('script')
    <script>


    </script>
@endsection