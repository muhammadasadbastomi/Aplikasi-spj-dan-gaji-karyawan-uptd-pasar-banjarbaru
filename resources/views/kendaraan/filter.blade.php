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
                                <h5 class="card-title">Filter Data Pencairan</h5>
                                <p></p>
                                <br>
                                <form  method="post" action="">
                                <div class="form-group">
                                    <label>Jenis </label>
                                    <select name="jenis_kendaraan" id="jenis_kendaraan" class="form-control">
                                        <option value="">-- Pilih Jenis --</option>
                                        <option value="Oprasional Transport Roda 2"> Oprasional Transport Roda 2</option>
                                        <option value="Oprasional Transport Roda 4"> Oprasional Transport Roda 4</option> 
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
