@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Data Pajak Pencairan</h4>
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
                                <h5 class="card-title">Tabel Data Pajak Pencairan</h5>
                                <div class="text-right">
                                <a href="{{route('golonganCetak')}}" class="btn btn-outline-info"><i class="mdi mdi-printer"></i> cetak</a>
                                <button href="" class="btn btn-outline-primary pull-right" id="tambah" >+ tambah data</button>
                                </div>
                                <br>
                                <div class="table-responsive">
                                    <table id="datatable" class=" text-center table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Golongan</th>
                                                <th>Keterangan</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="mediumModal"  role="dialog" >
                    <div class="modal-dialog modal-lg" >
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Tambah Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form  method="post" action="">
                                <div class="form-group"><input type="hidden" id="id" name="id"  class="form-control"></div>
                                <div class="form-group"><label  class=" form-control-label">Nama golongan</label><input type="text" id="golongan" name="golongan" placeholder="Pangkat / Golongan" class="form-control"></div>
                                <div class="form-group"><label  class=" form-control-label">Keterangan</label> <textarea id="keterangan" name="keterangan" placeholder="" class="form-control"></textarea></div>
                            <div class="modal-footer">
                                <button type="button" class="btn " data-dismiss="modal"> <i class="ti-close"></i> Batal</button>
                                <button id="btn-form" type="submit" class="btn btn-primary"><i class="ti-save"></i> Simpan</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
      </div>
 </div>
@endsection
@section('script')
    <script>
        //fungsi hapus
        hapus = (uuid, golongan) =>{
            let csrf_token=$('meta[name="csrf_token"]').attr('content');
            Swal.fire({
                        title: 'apa anda yakin?',
                        text: " Menghapus Kecamatan data " + golongan,
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'hapus data',
                        cancelButtonText: 'batal',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url : "{{ url('/api/golongan')}}" + '/' + uuid,
                                type : "POST",
                                data : {'_method' : 'DELETE', '_token' :csrf_token},
                                success: function (response) {
                                    Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Data Berhasil Dihapus',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            $('#datatable').DataTable().ajax.reload(null, false);
                        },
                    })
                    } else if (result.dismiss === swal.DismissReason.cancel) {
                        Swal.fire(
                        'Dibatalkan',
                        'data batal dihapus',
                        'error'
                        )
                    }
                })
            }

            //event btn tambah klik
            $('#tambah').click(function(){
                $('.modal-title').text('Tambah Data');
                $('#golongan').val('');
                $('#keterangan').val('');
                $('#btn-form').text('Simpan Data');
                $('#mediumModal').modal('show');
            })

            //event btn edit klik
            edit = uuid =>{
                $.ajax({
                    type: "GET",
                    url: "{{ url('/api/golongan')}}" + '/' + uuid,
                    beforeSend: false,
                    success : function(returnData) {
                        $('.modal-title').text('Edit Data');
                        $('#id').val(returnData.data.uuid);
                        $('#golongan').val(returnData.data.golongan);
                        $('#keterangan').val(returnData.data.keterangan);
                        $('#btn-form').text('Ubah Data');
                        $('#mediumModal').modal('show');
                    }
                })
            }

            //fungsi render datatable
            $(document).ready(function() {
                $('#datatable').DataTable( {
                    responsive: true,
                    processing: true,
                    serverSide: false,
                    searching: true,
                    ajax: {
                        "type": "GET",
                        "url": "{{route('API.golongan.get')}}",
                        "dataSrc": "data",
                        "contentType": "application/json; charset=utf-8",
                        "dataType": "json",
                        "processData": true
                    },
                    columns: [
                        {"data": "golongan"},
                        {"data": "keterangan"},
                        {data: null , render : function ( data, type, row, meta ) {
                            let uuid = row.uuid;
                            let golongan = row.golongan;
                            return type === 'display'  ?
                            '<button onClick="edit(\''+uuid+'\')" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editmodal"><i class="mdi mdi-pencil"></i></button> <button onClick="hapus(\'' + uuid + '\',\'' + golongan + '\')" class="btn btn-sm btn-danger" > <i class="mdi mdi-popcorn"></i></button>':
                        data;
                        }}
                    ]
                });

                //event form submit
                $("form").submit(function (e) {
                    e.preventDefault()
                    let form = $('#modal-body form');
                    if($('.modal-title').text() == 'Edit Data'){
                        let url = '{{route("API.golongan.update", '')}}'
                        let id = $('#id').val();
                        $.ajax({
                            url: url+'/'+id,
                            type: "put",
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
                    }else{
                        $.ajax({
                            url: "{{Route('API.golongan.create')}}",
                            type: "post",
                            data: $(this).serialize(),
                            success: function (response) {
                                form.trigger('reset');
                                $('#mediumModal').modal('hide');
                                $('#datatable').DataTable().ajax.reload();
                                if (response.Error) {

                                    var array = $.map(response, function(value, index) {
                                                        return [value];
                                    });
                                    Swal.fire({
                                    position: 'top-end',
                                    icon: 'error',
                                    title: response.Error,
                                    showConfirmButton: false,
                                    timer: 1500
                                    })
                                }else{
                                    Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Data Berhasil Disimpan',
                                    showConfirmButton: false,
                                    timer: 1500
                                    })
                                }
                            },
                            error:function(response){
                                console.log(response);
                            }
                        })
                    }
                } );
                } );
    </script>
@endsection
