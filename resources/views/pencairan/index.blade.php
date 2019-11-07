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
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Pencairan Bulan</th>
                                                <th>Keperluan</th>
                                                <th>Total (Rp.)</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>12/UPTD/PASAR/2019</td>
                                                <td>Agustus</td>
                                                <td>Belanja Alat Tulis Kantor</td>
                                                <td>2.340.000</td>
                                                <td class="text-center">
                                                <a href="{{Route('pegawaiDetail')}}" class="btn btn-primary"><i class="mdi mdi-eye"></i> Detail</a>
                                                <a href="" class="btn btn-danger"><i class="mdi mdi-popcorn"></i> hapus</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Pencairan Bulan</th>
                                                <th>Keperluan</th>
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
