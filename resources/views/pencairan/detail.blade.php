@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
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
                            <br>
                                <h3 class="card-title text-center">Detail Pencairan</h3>
                                <hr>
                                <br>
                                    <input type="hidden" name="pencairan_id" id="pencairan_id" value="{{$pencairan->id}}">
                                    <div class="form-group m-t-20">
                                        <label style="margin-right:30px;"> Keperluan Pencairan :</label>
                                        <label for="">{{$pencairan->keperluan}}</label>
                                    </div>
                                    <div class="form-group m-t-20">
                                        <label style="margin-right:30px;"> Pencairan Bulan :</label>
                                        <label>{{$pencairan->created_at}}</label>
                                    </div>
                                    <div class="form-group m-t-20">
                                        <label style="margin-right:30px;"> Total Pencairan :</label>
                                        <label>Rp.{{$pencairan->total}}</label>
                                    </div>
                                <br>
                                <br>
                                <table id="datatable" class="table table-striped table-bordered text-center">
                                        <thead>
                                            <tr>
                                                <th>Item</th>
                                                <th>Satuan</th>
                                                <th>Harga Satuan</th>
                                                <th>Jumlah</th>
                                                <th>total (Rp.) </th>
                                            </tr>
                                        </thead>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Item</th>
                                                <th>Satuan</th>
                                                <th>Harga Satuan</th>
                                                <th>Jumlah</th>
                                                <th>total</th> 
                                            </tr>
                                        </tfoot>
                                    </table>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{Route('notaPencairan',$pencairan->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Cetak Nota Dinas</a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('script')
    <script>
             //fungsi render datatable            
             $(document).ready(function() {
                let id = $('#pencairan_id').val();
                $('#datatable').DataTable( {
                    responsive: true,
                    processing: true,
                    serverSide: false,
                    searching: true,
                    ajax: {
                        "type": "GET",
                        "url": "{{ url('/api/rincian/get')}}" + '/' + id,
                        "dataSrc": "data",
                        "contentType": "application/json; charset=utf-8",
                        "dataType": "json",
                        "processData": true
                    },
                    columns: [
                        {"data": "item.nama" },
                        {"data": "item.satuan"},
                        {"data": "item.harga"},
                        {"data": "volume"},
                        {"data": "total_harga_item"}
                    ]
                });
            });
           
    </script>
@endsection