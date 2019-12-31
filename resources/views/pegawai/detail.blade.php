@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Detail Pegawai</h4>
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
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            
                            <img src="{{asset('/img/pegawai/'.$pegawai->foto)}}" height="300" alt="">
                        </div>
                        <div class="card-footer text-center">
                            <a href="" class="btn btn-block btn-primary"> cetak profil pegawi</a>
                        </div>
                    </div>
                    <div class="col-lg-9">
                    <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Detail Pegawai</span></a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="p-20">
                                    <label for="">Biodata</label>
                                        <div class="row">
                                        <div class="col-xl-6">
                                            <table class="table">
                                            <tbody>
                                                <tr>
                                                <th>Nama</th>
                                                <td>: {{$pegawai->nama}}</td>
                                                </tr>
                                                <tr>
                                                <th>NIP</th>
                                                <td>: {{$pegawai->NIP}}</td>
                                                </tr>
                                                <tr>
                                                <th>Tempat - tanggal Lahir</th>
                                                <td>: {{$pegawai->tempat_lahir}} - {{$pegawai->tanggal_lahir}} </td>
                                                </tr>                            
                                                <tr>
                                                <th>Alamat</th>
                                                <td>: {{$pegawai->alamat}}</td>
                                                </tr>
                                                </tr>                            
                                                <tr>
                                                <th>Jenis kelamin</th>
                                                <td>: {{$pegawai->jk}}</td>
                                                </tr>
                                                <tr>
                                                <th>Agama</th>
                                                <td>: {{$pegawai->agama}}</td>
                                                </tr>                            <tr>
                                                <th>golongan Darah</th>
                                                <td>: {{$pegawai->golongan_darah}}</td>
                                                </tr>
                                                <tr>
                                                <tr>
                                                <th>Status Kepegawaian</th>
                                                <td>: {{$pegawai->status_pegawai}}</td>
                                                </tr>
                                                <tr>
                                                <th>golongan</th>
                                                <td>: {{$pegawai->golongan->golongan}}</td>
                                                </tr>
                                                <tr>
                                                <th>jabatan</th>
                                                <td>: {{$pegawai->jabatan->jabatan}}</td>
                                                </tr>                             
                                                <tr>
                                                <th>Status Pernikahan</th>
                                                <td>: {{$pegawai->status_kawin}}</td>
                                                </tr>
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
