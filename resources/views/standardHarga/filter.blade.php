@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Data Standad Harga</h4>
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
                        <h5 class="card-title">Filter Data Item</h5>
                        <br>
                        <form action="" method="post">
                            <div class="form-group">
                                <label>Keperluan </label>
                                    <select name="keperluan" id="keperluan" class="form-control">
                                        <option value="">-- Pilih Keperluan --</option>
                                        <option value="Belanja Alat Tulis kantor">Belanja Alat Tulis kantor</option>
                                        <option value="Belanja Peralatan dan Perlengkapan komputer">Belanja Peralatan dan Perlengkapan komputer</option>
                                        <option value="Belanja Oprasional Transport Roda 2">Belanja Oprasional Transport Roda 2</option>
                                        <option value="Belanja Oprasional Transport Roda 4">Belanja Oprasional Transport Roda 4</option>
                                        <option value="Belanja Gajih Pegawai Kontrak">Belanja Gajih Pegawai Kontrak</option>
                                        <option value="Belanja Makan Minum Harian">Belanja Makan Minum Harian</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                            <div class="text-right">
                                <a href=""  class="" ><i class="mdi mdi-close-circle-outline"></i> Batal</a>
                                <button type="submit" name="submit" id="btn-form" class="btn btn-primary"> <i class="mdi mdi-printer"></i> Cetak Data</button>
                            </div>    
                            </div>
                            {{csrf_field() }}
                        </form>
                </div>
            </div>
        </div>
    </div>
     </div>       
        </div>
@endsection