@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Data User</h4>
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
                                <h5 class="card-title">Tabel Data User</h5>
                                <div class="text-right">
                                <a href="" class="btn btn-outline-info"><i class="mdi mdi-printer"></i> cetak</a>
                                <a href="" class="btn btn-outline-danger" data-toggle="modal" data-target="#tambahData"><i class="mdi mdi-add"></i>+ tambah data</a>               
                                </div>
                                <br>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Username</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>admin123</td>
                                                <td class="text-center">
                                                    <a href="{{Route('standardHargaEdit')}}" class="btn btn-info"><i class="mdi mdi-pencil"></i> </a>
                                                    <a href="" class="btn btn-danger"><i class="mdi mdi-popcorn"></i> </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Username</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
             

            </div>
           
        </div>

<!-- Modal -->
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="tambahData" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group m-t-20">
        <label> Nama</label>
        <input type="text" class="form-control date-inputmask" id="date-mask" placeholder="">
     </div>
     <div class="form-group">
        <label>Harga Satuan </label>
        <input type="text" class="form-control phone-inputmask" id="phone-mask" placeholder="">
     </div>
     <div class="form-group">
        <label>Keperluan </label>
        <select name="" id="" class="form-control">
            <option value="">Belanja Alat Tulis Kantor</option>
            <option value="">Makan Minum Oprasional</option>
            <option value="">Belanja Peralatan dan Perlengkapan Komputer</option>
            <option value="">Gajih Honorer</option>
        </select>
     </div>
    </div>
        <div class="modal-footer">
            <a href=""  class="" data-dismiss="modal"><i class="mdi mdi-close-circle-outline"></i> Batal</a>
            <button type="button" class="btn btn-primary"> <i class="mdi mdi-content-save-outline"></i> Simpan</button>
        </div>
    </div>
  </div>
</div>
@endsection
