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
                                <h5 class="card-title">Tabel Data Standard Harga</h5>
                                <div class="text-right">
                                <a href="{{route('itemCetak')}}" class="btn btn-outline-info"><i class="mdi mdi-printer"></i> cetak</a>
                                <a href="{{route('itemFilter')}}" class="btn btn-outline-info"><i class="mdi mdi-printer"></i> cetak Filter</a>
                                <a href="" class="btn btn-outline-danger" id="tambah" data-toggle="modal" ><i class="mdi mdi-add"></i>+ tambah data</a>               
                                </div>
                                <br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Satuan</th>
                                                <th>Harga satuan</th>
                                                <th>Keperluan</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Satuan</th>
                                                <th>Harga satuan</th>
                                                <th>Keperluan</th>
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
      <form action="" method="post">
      <input type="hidden" id="id" name="id">
      <div class="form-group m-t-20">
        <label> Nama</label>
        <input type="text" class="form-control date-inputmask" id="nama" name="nama" placeholder="">
     </div>
     <div class="form-group m-t-20">
        <label> Satuan</label>
        <input type="text" class="form-control date-inputmask" id="satuan" name="satuan" placeholder="">
     </div>
     <div class="form-group">
        <label>Harga </label>
        <input type="text" class="form-control phone-inputmask" id="harga" name="harga" placeholder="">
     </div>
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
        <div class="modal-footer">
            <a href=""  class="" data-dismiss="modal"><i class="mdi mdi-close-circle-outline"></i> Batal</a>
            <button type="submit" id="btn-form" class="btn btn-primary"> <i class="mdi mdi-content-save-outline"></i> Simpan</button>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection

@section('script') 
    <script>
        //fungsi hapus
        hapus = (uuid, name) =>{
            let csrf_token=$('meta[name="csrf_token"]').attr('content');
            Swal.fire({
                        title: 'apa anda yakin?',
                        text: " Menghapus Kecamatan item " + name,
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'hapus data',
                        cancelButtonText: 'batal',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url : "{{ url('/api/item')}}" + '/' + uuid,
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
                $('#nama').val('');
                $('#satuan').val('');
                $('#harga').val('');
                $('#keperluan').val('');    
                $('#btn-form').text('Simpan Data');
                $('#tambahData').modal('show');
            })

            //event btn edit klik        
            edit = uuid =>{
                $.ajax({
                    type: "GET",
                    url: "{{ url('/api/item')}}" + '/' + uuid,
                    beforeSend: false,
                    success : function(returnData) {
                        $('.modal-title').text('Edit Data');
                        $('#id').val(returnData.data.uuid);
                        $('#nama').val(returnData.data.nama);
                        $('#satuan').val(returnData.data.satuan);
                        $('#harga').val(returnData.data.harga);
                        $('#keperluan').val(returnData.data.keperluan);    
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
                    serverSide: false,
                    searching: true,
                    ajax: {
                        "type": "GET",
                        "url": "{{route('API.item.get')}}",
                        "dataSrc": "data",
                        "contentType": "application/json; charset=utf-8",
                        "dataType": "json",
                        "processData": true
                    },
                    columns: [
                        {"data": "nama"},
                        {"data": "satuan"},
                        {"data": "harga"},
                        {"data": "keperluan"},
                        {data: null , render : function ( data, type, row, meta ) {
                            let uuid = row.uuid;
                            let name = row.nama;
                            return type === 'display'  ?
                            '<button onClick="edit(\''+uuid+'\')" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editmodal"><i class="mdi mdi-pencil"></i></button> <button onClick="hapus(\'' + uuid + '\',\'' + name + '\')" class="btn btn-sm btn-danger" > <i class="mdi mdi-popcorn"></i></button>':
                        data;
                        }}
                    ]
                });

                //event form submit            
                $("form").submit(function (e) {
                    e.preventDefault()
                    let form = $('#modal-body form');
                    if($('.modal-title').text() == 'Edit Data'){
                        let url = '{{route("API.item.update", '')}}'
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
                            url: "{{Route('API.item.create')}}",
                            type: "post",
                            data: $(this).serialize(),
                            success: function (response) {
                                form.trigger('reset');
                                $('#tambahData').modal('hide');
                                $('#datatable').DataTable().ajax.reload();
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Your work has been saved',
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