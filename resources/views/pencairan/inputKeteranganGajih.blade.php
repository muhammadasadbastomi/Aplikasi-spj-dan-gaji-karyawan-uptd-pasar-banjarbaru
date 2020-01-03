@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">input {{$keperluan}} - {{$no_rek}}</h4>
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
                                <h5 class="card-title">Input Data Pencairan</h5>
                                <br>
                                <form action="" method="post">
                                    <div class="form-group m-t-20">
                                        <label style="margin-right:30px;"> Keperluan Pencairan :</label>
                                        <label> input {{$keperluan}} - {{$no_rek}}</label>
                                        <input type="hidden" name="keperluan" id="keperluan" value="{{$keperluan}}">
                                    </div>
                                    <div class="form-group m-t-20">
                                        <label style="margin-right:30px;"> Pencairan Bulan :</label>
                                        <label> Agustus</label>
                                    </div>
                                    <div class="form-group m-t-20">
                                        <label> Jumlah Karyawan Kontrak</label>
                                         : <label for="" class="badge badge-success"> {{$pegawai->count()}} Karyawan Kontrak (ambil jumlah dari data pegawai))</label>
                                         <input type="hidden" name="keperluan" id="keperluan" value="{{$pegawai->count()}}">
                                    </div>
                                    <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-success">Selesai, buat pencairan</button>
                                    </form>                               
                                    </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
