@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Edit Data Pajak</h4>
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
                                <h5 class="card-title">Edit Data Pajak Pencairan</h5>
                                <br>
                                <form action="" method="post">
                                <div class="form-group m-t-20">
                                    <label> Nama Pajak</label>
                                    <input type="text" class="form-control date-inputmask" id="date-mask" >
                                </div>
                                <div class="form-group">
                                    <label>Potongan </label>
                                    <input type="text" class="form-control phone-inputmask" id="phone-mask" >
                                </div>
                                </form>
                            </div>
                            <div class="card-footer text-right">
                                <a href=""  class="" ><i class="mdi mdi-close-circle-outline"></i> Batal</a>
                                <button type="button" class="btn btn-primary"> <i class="mdi mdi-content-save-outline"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
