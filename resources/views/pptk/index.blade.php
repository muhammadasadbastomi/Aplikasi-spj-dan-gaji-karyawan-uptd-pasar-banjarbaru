@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Data PPTK</h4>
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
                                <h5 class="card-title">Tabel Data PPTK</h5>
                                <div class="text-right">
                                <a href="{{Route('pptkCetak')}}" class="btn btn-outline-info"><i class="mdi mdi-printer"></i> cetak</a>
                                <button href="" class="btn btn-outline-primary pull-right" id="tambah" >+ tambah data</button>
                                </div>
                                <br>
                                <div class="table-responsive">
                                    <table id="datatable" class="text-center table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>NIP</th>
                                                <th>Jabatan</th>
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
        <div class="modal fade" id="tambahData"  role="dialog" >
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
                                <div class="form-group"><label  class=" form-control-label">Nama </label><input type="text" id="nama" name="nama" placeholder="Nama" class="form-control"></div>
                                <div class="form-group"><label  class=" form-control-label">NIP </label><input type="text" id="NIP" name="NIP" placeholder="NIP" class="form-control"></div>
                                <div class="form-group"><label  class=" form-control-label">Jabatan</label>
                                    <select name="jabatan" id="jabatan" class="form-control">
                                        <option value=""> -- pilih jabatan --</option>
                                        <option value="Kepala UPT"> Kepala UPT</option>
                                        <option value="Kasubag Tata usaha"> Kasubag Tata usaha</option>
                                    </select>
                                </div>
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
    hapus = (uuid, nama)=>{
        let csrf_token=$('meta[name="csrf_token"]').attr('content');
        Swal.fire({
                    title: 'apa anda yakin?',
                    text: " Menghapus  Data PPTK " + nama,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'hapus data',
                    cancelButtonText: 'batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url : "{{ url('/api/pptk')}}" + '/' + uuid,
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
        
        //event btn klikx   
        $('#tambah').click(function(){
            $('.modal-title').text('Tambah Data');
            $('#nama').val('');
            $('#NIP').val('');
            $('#jabatan').val('');                                  
            $('#btn-form').text('Simpan Data');
            $('#tambahData').modal('show');
        })

        //event btn edit klik
        edit = uuid =>{
            $.ajax({
                type: "GET",
                url: "{{ url('/api/pptk')}}" + '/' + uuid,
                beforeSend: false,
                success : function(returnData) {
                    $('.modal-title').text('Edit Data');
                    $('#id').val(returnData.data.uuid);
                    $('#nama').val(returnData.data.nama);
                    $('#NIP').val(returnData.data.NIP);
                    $('#jabatan').val(returnData.data.jabatan);
                    $('#btn-form').text('Ubah Data');
                    $('#tambahData').modal('show'); 
                }
            })
        }
        //fungsi render datatable         
        $(document).ready(function() {
            $('#datatable').DataTable( {
                responsive: true,
                processing: true,
                serverSide: true,
                searching : true,
                paging    : true,
                ajax: {
                    "type"          : "GET",
                    "url"           : "{{route('API.pptk.get')}}",
                    "dataSrc"       : "data",
                    "contentType"   : "false",
                    "enctype"       : 'multipart/form-data',
                    "dataType"      : "json",
                    "processData"   : true
                },
                columns: [
                    {"data": "nama"},
                    {"data": "NIP"},
                    {"data": "jabatan"},
                    {data: null , render : function ( data, type, row, meta ) {
                        let uuid = row.uuid;
                        let nama = row.nama;
                        return type === 'display'  ?
                        ' <button onClick="edit(\''+uuid+'\')" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editmodal"><i class="fas fa-edit"></i></button> <button onClick="hapus(\'' + uuid + '\',\'' + nama + '\')" class="btn btn-sm btn-danger" > <i class="fas fa-trash"></i></button>':
                    data;
                    }}
                ]
            });
            //event form submit        
            $("form").submit(function (e) {
                e.preventDefault()
                let form = $('#modal-body form');
                if($('.modal-title').text() == 'Edit Data'){
                    let url = '{{route("API.pptk.update", '')}}'
                    let id = $('#id').val();
                    $.ajax({
                            url: url+'/'+id,
                            type: "put",
                            data: $(this).serialize(),
                        success: function (response) {
                            form.trigger('reset');
                            $('#tambahData').modal('hide');
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
                        url: "{{Route('API.pptk.create')}}",
                        type: "post",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (response) {
                            form.trigger('reset');
                            $('#tambahData').modal('hide');
                            $('#datatable').DataTable().ajax.reload();
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Data Berhasil Disimpan',
                                showConfirmButton: false,
                                timer: 1500
                            })
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