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
                                <h5 class="card-title">Input Data Pencairan</h5>
                                <br>
                                <form action="" method="post">
                                    <input type="hidden" name="pencairan_id" id="pencairan_id" value="{{$pencairan_id}}">
                                    <div class="form-group m-t-20">
                                        <label style="margin-right:30px;"> Keperluan Pencairan :</label>
                                        <label for="">{{$keperluan}} - {{$no_rek}}</label>
                                        <input type="text" name="keperluan" id="keperluan" value="{{$keperluan}}">
                                    </div>
                                    <div class="form-group m-t-20">
                                        <label style="margin-right:30px;"> Pencairan Bulan :</label>
                                        <label>{{$tgl}}</label>
                                    </div>
                                    <div class="form-group">
                                        <label>Item </label>
                                        <select name="item_id" id="item_id" class="form-control">
                                            <option value="">-- Pilih Item --</option>
                                            @foreach($item as $p)
                                            <option value="{{$p->uuid}}">{{$p->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group m-t-20">
                                        <label> Jumlah</label>
                                        <input type="number" class="form-control date-inputmask" id="volume" name="volume" placeholder="Jumlah Item">
                                    </div>
                                <div class="text-right">
                                <button type="submit" name="submit"id="btn-form" class="btn btn-primary">Input Item</button>
                                {{csrf_field() }}
                                </form>
                                <br>
                                <br>
                                <table  id="datatable" class="table table-striped table-bordered text-center">
                                        <thead>
                                            <tr>
                                                <th>Item</th>
                                                <th>Satuan</th>
                                                <th>Harga Satuan</th>
                                                <th>Jumlah</th>
                                                <th>total</th>
                                                <th class="text-center">Aksi</th>
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
@section('script')
    <script>
             //fungsi render datatable            
             $(document).ready(function() {
                $('#datatable').DataTable( {
                    responsive: true,
                    processing: true,
                    serverSide: false,
                    searching: true,
                    ajax: {
                        "type": "GET",
                        "url": "{{route('API.rincian.get')}}",
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
                        {"data": "total_harga_item"},
                        {data: null , render : function ( data, type, row, meta ) {
                            let uuid = row.uuid;
                            let jabatan = row.jabatan;
                            return type === 'display'  ?
                            '<button onClick="edit(\''+uuid+'\')" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editmodal"><i class="mdi mdi-pencil"></i></button> <button onClick="hapus(\'' + uuid + '\',\'' + jabatan + '\')" class="btn btn-sm btn-danger" > <i class="mdi mdi-popcorn"></i></button>':
                        data;
                        }}
                    ]
                });
            });
                                //event form submit            
                $("form").submit(function (e) {
                    e.preventDefault()
                    let form = $('#modal-body form');
                        let url = '{{route("API.rincian.create")}}'
                        let id = $('#id').val();
                        $.ajax({
                            url: url,
                            type: "post",
                            data: $(this).serialize(),
                            success: function (response) {
                                form.trigger('reset');
                                $('#mediumModal').modal('hide');
                                $('#datatable').DataTable().ajax.reload();
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Data Berhasil Tersimpan',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            },
                            error:function(response){
                                console.log(response);
                            }
                        })
                } );
        
    </script>
@endsection