@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">input Pencairan</h4>
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
                                <form  method="post" action="">
                                    <div class="form-group m-t-20">
                                        <label> Bulan Pencairan</label>
                                        <input type="Date" class="form-control date-inputmask" id="date-mask" placeholder="Masukan NIP/NRTK">
                                    </div>
                                    <div class="form-group">
                                        <label>Keperluan </label>
                                        <select name="keperluan" id="keperluan" class="form-control">
                                            <option value="Belanja Alat Tulis kantor">Belanja Alat Tulis kantor</option>
                                            <option value="Belanja Peralatan dan Perlengkapan komputer">Belanja Peralatan dan Perlengkapan komputer</option>
                                            <option value="Belanja Oprasional Transport Roda 2">Belanja Oprasional Transport Roda 2</option>
                                            <option value="Belanja Oprasional Transport Roda 4">Belanja Oprasional Transport Roda 4</option>
                                            <option value="Belanja Gajih Pegawai Kontrak">Belanja Gajih Pegawai Kontrak</option>
                                            <option value="Belanja Makan Minum Harian">Belanja Makan Minum Harian</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href=""  class="btn" > <i class="mdi mdi-close"></i> Batal</a>
                                <button id="btn-form" type="submit" class="btn btn-primary"><i class="ti-save"></i> Simpan</button>
                                {{csrf_field() }}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
