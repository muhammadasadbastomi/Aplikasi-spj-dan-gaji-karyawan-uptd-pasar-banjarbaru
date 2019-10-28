@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Data Keperluan</h4>
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
                                <h5 class="card-title">Edit Data Keperluan</h5>
                                <br>
                                <form action="" method="post">
                                <div class="form-group m-t-20">
                                    <label> Nomor Rek</label>
                                    <input type="text" class="form-control date-inputmask" id="date-mask" placeholder="5.2.2.xx">
                                </div>
                                <div class="form-group">
                                    <label>Keperluan </label>
                                    <input type="text" class="form-control phone-inputmask" id="phone-mask" placeholder="Belanja XXX">
                                </div>
                                <div class="form-group">
                                    <label>Pajak </label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Isi Jika ada</option>
                                        <option value="">PPN</option>
                                        <option value="">PPh 21</option>
                                        <option value="">PPh 22</option>
                                        <option value="">PPh 23</option>
                                        <option value="">PPh 24</option>
                                    </select>
                                </div>
                                </form>
                            </div>
                            <div class="card-footer text-right">
                                <a href=""  class="btn" ><i class="mdi mdi-close-circle-outline"></i> Batal</a>
                                <button type="button" class="btn btn-primary"> <i class="mdi mdi-content-save-outline"></i> Ubah data</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
