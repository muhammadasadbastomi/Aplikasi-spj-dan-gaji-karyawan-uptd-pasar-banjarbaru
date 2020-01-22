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
                                <h5 class="card-title">Filter Data Guru Berdasarkan Jabatan</h5>
                                <p></p>
                                <br>
                                <form  method="post" action="">
                                    <div class="form-group">
                                    <label> Jabatan</label>
                                    <select name="jabatan" id="jabatan" class="form-control">
                                        <option value=""> -- Pilih Jabatan --</option>
                                        <option value="Kepala UPT"> Kepala UPT</option>
                                        <option value="Kasubag TU"> Kasubag TU</option>
                                        <option value="Pelaksana"> Pelaksana</option>
                                        <option value="Tenaga Kebersihan Kantor"> Tenaga Kebersihan Kantor</option>
                                        <option value="Tenaga Keamanan Kantor">Tenaga Keamanan Kantor</option>
                                        <option value="Pengawas Kebersihan Pasar">Pengawas Kebersihan Pasar</option>
                                    </select>
                                    </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href=""  class="btn" > <i class="mdi mdi-close"></i> Batal</a>
                                <button id="btn-form" type="submit" class="btn btn-primary"><i class="ti-save"></i> Cetak Data</button>
                                {{csrf_field() }}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
