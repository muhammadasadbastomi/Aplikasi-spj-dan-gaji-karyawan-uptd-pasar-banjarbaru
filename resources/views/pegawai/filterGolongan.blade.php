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
                                <h5 class="card-title">Filter Data Guru berdasarkan Golongan</h5>
                                <p></p>
                                <br>
                                <form  method="post" action="">
                                    <div class="form-group">
                                        <label>Golongan </label>
                                        <select name="golongan_id" id="golongan" class="form-control">
                                            <option value=""> -- Pilih Golongan --</option>
                                            <option value="II/a"> II/a</option>
                                            <option value="II/b"> II/b</option>
                                            <option value="II/c"> II/c</option>
                                            <option value="II/d"> II/d</option>
                                            <option value="III/a"> III/a</option>
                                            <option value="III/b"> III/b</option>
                                            <option value="III/c"> III/c</option>
                                            <option value="III/d"> III/d</option>
                                            <option value="IV/a"> IV/a</option>
                                            <option value="IV/b"> IV/b</option>
                                            <option value="IV/c"> IV/c</option>
                                            <option value="IV/d"> IV/d</option>
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
