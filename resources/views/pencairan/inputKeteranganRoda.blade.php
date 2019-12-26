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
                                    </div>
                                    <div class="form-group m-t-20">
                                        <label style="margin-right:30px;"> Pencairan Bulan :</label>
                                        <label> Agustus</label>
                                    </div>
                                    <div class="form-group">
                                        <label>Kendaraan </label>
                                        <select name="" id="" class="form-control">
                                            <option value="">Data ngambil dari data kendaraan (Roda 2)</option>
                                            <option value="">DA.6402.PAD</option>
                                        </select>
                                    </div>
                                    <div class="form-group m-t-20">
                                        <label> Jumlah Pencairan</label>
                                        <input type="number" class="form-control date-inputmask" id="date-mask" >
                                    </div>
                                </form>
                                <div class="text-right">
                                <a href="{{Route('inputKeterangan')}}" class="btn btn-primary">Input Item</a>
                                <br>
                                <br>
                                <table  class="table table-striped table-bordered text-center">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kendaraan</th>
                                                <th>Satuan</th>
                                                <th>Harga Satuan</th>
                                                <th>Jumlah Pencairan</th>
                                                <th>total</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>DA.6402 PAD</td>
                                                <td>Buah </td>
                                                <td class="text-center">Rp.20.000</td>
                                                <td class="text-center">5</td>
                                                <td class="text-center">Rp.100.000</td>
                                                <td class="text-center">
                                                <a href="{{Route('pegawaiEdit')}}" class="btn btn-info"><i class="mdi mdi-pencil"></i> edit</a>
                                                <a href="" class="btn btn-danger"><i class="mdi mdi-popcorn"></i> hapus</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>DA.6403 PAD</td>
                                                <td>Buah </td>
                                                <td class="text-center">Rp.20.000</td>
                                                <td class="text-center">6</td>
                                                <td class="text-center">Rp.120.000</td>
                                                <td class="text-center">
                                                <a href="{{Route('pegawaiEdit')}}" class="btn btn-info"><i class="mdi mdi-pencil"></i> edit</a>
                                                <a href="" class="btn btn-danger"><i class="mdi mdi-popcorn"></i> hapus</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Item</th>
                                                <th>Satuan</th>
                                                <th>Harga Satuan</th>
                                                <th>Jumlah</th>
                                                <th>total</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="card-footer text-right">
                                    <a href="{{Route('inputKeterangan')}}" class="btn btn-success">Selesai, buat pencairan</a>
                                    </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
