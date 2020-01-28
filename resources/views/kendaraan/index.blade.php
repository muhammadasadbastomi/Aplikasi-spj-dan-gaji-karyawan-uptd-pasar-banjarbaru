@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Data Kendaraan</h4>
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
                                <h5 class="card-title">Tabel Data Kendaraan</h5>
                                <div class="text-right">
                                <a href="{{Route('kendaraanCetak')}}" class="btn btn-outline-info"><i class="mdi mdi-printer"></i> cetak</a>
                                <a href="" class="btn btn-outline-danger" data-toggle="modal" id="tambah"><i class="mdi mdi-add"></i>+ tambah data</a>               
                                </div>
                                <br>
                                <div class="table-responsive">
                                    <table id="datatable" class="text-center table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nopol</th>
                                                <th>Merk</th>
                                                <th>Warna</th>
                                                <th>Jenis Kendaraan</th>
                                                <th>Tahun</th>
                                                <th>Pemegang</th>
                                                <th>Tahun Lelang</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Nopol</th>
                                                <th>Merk</th>
                                                <th>Warna</th>
                                                <th>Jenis Kendaraan</th>
                                                <th>Tahun</th>
                                                <th>Pemegang</th>
                                                <th>Tahun Lelang</th>
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
            <label> Nomor Polisi</label>
            <input type="text" class="form-control date-inputmask" id="nopol" name="nopol" placeholder="">
        </div>
        <div class="form-group">
            <label>Merek </label>
            <input type="text" class="form-control phone-inputmask" id="merk" name="merk" placeholder="">
        </div>
        <div class="form-group">
            <label>Warna </label>
            <input type="text" class="form-control phone-inputmask" id="warna" name="warna" placeholder="">
        </div>
        <div class="form-group">
            <label>Jenis </label>
            <select name="jenis_kendaraan" id="jenis_kendaraan" class="form-control">
                <option value="">-- Pilih Jenis --</option>
                <option value=" Oprasional Transport Roda 2"> Oprasional Transport Roda 2</option>
                <option value=" Oprasional Transport Roda 2"> Oprasional Transport Roda 3</option>
                <option value=" Oprasional Transport Roda 4"> Oprasional Transport Roda 4</option> 
            </select>
        </div>
        <div class="form-group">
            <label>Tahun Keluar </label>
            <input type="text" class="form-control phone-inputmask" id="tahun_keluar" name="tahun_keluar" placeholder="">
        </div>
        <div class="form-group">
            <label>Pemegang Aset </label>
            <select name="pegawai_id" id="pegawai_id" class="form-control">
                <option value="">-- pilih pegawai --</option>
            </select>
        </div>
        {{-- <div class="form-group">
            <label>Tahun Lelang </label>
            <input type="text" class="form-control phone-inputmask" id="tahun_lelang" name="tahun_lelang" placeholder="">
        </div> --}}
    </div>
      <div class="modal-footer">
        <a href=""  class="" data-dismiss="modal"><i class="mdi mdi-close-circle-outline"></i> Batal</a>
        <button type="submit" name="submit" class="btn btn-primary"> <i class="mdi mdi-content-save-outline"></i> Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
    $("#tahun_keluar").datepicker( {
        format: " yyyy", // Notice the Extra space at the beginning
        viewMode: "years", 
        minViewMode: "years"
    });
    $("#tahun_lelang").datepicker( {
        format: " yyyy", // Notice the Extra space at the beginning
        viewMode: "years", 
        minViewMode: "years"
    });

    getPegawai = () => {
        $.ajax({
                type: "GET",
                url: "{{ url('/api/pegawai')}}",
                beforeSend: false,
                success : function(returnData) {
                    $.each(returnData.data, function (index, value) {
                    $('#pegawai_id').append(
                        '<option value="'+value.uuid+'">'+value.nama+'</option>'
                    )
                })
            }
        })
    }
    getPegawai();
    //fungsi hapus

    hapus = (uuid, nama)=>{
        let csrf_token=$('meta[name="csrf_token"]').attr('content');
        Swal.fire({
                    title: 'apa anda yakin?',
                    text: " Menghapus  Data diklat " + nama,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'hapus data',
                    cancelButtonText: 'batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url : "{{ url('/api/kendaraan')}}" + '/' + uuid,
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
            $('#pegawai_id').val('');
            $('#jenis_kendaraan').val('');
            $('#nopol').val('');
            $('#merk').val('');
            $('#warna').val('');
            $('#tahun_keluar').val('');                                    
            // $('#tahun_lelang').val('');                                                                        
            $('#btn-form').text('Simpan Data');
            $('#tambahData').modal('show');
        })
        //event btn edit klik
        edit = uuid =>{
            $.ajax({
                type: "GET",
                url: "{{ url('/api/kendaraan')}}" + '/' + uuid,
                beforeSend: false,
                success : function(returnData) {
                    $('.modal-title').text('Edit Data');
                    $('#id').val(returnData.data.uuid);
                    $('#pegawai_id').val(returnData.data.pegawai.uuid);
                    $('#jenis_kendaraan').val(returnData.data.jenis_kendaraan);
                    $('#nopol').val(returnData.data.nopol);
                    $('#merk').val(returnData.data.merk);
                    $('#warna').val(returnData.data.warna);
                    $('#tahun_keluar').val(returnData.data.tahun_keluar);  
                    // $('#tahun_lelang').val(returnData.data.tahun_lelang);    
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
                    "url"           : "{{route('API.kendaraan.get')}}",
                    "dataSrc"       : "data",
                    "contentType"   : "false",
                    "enctype"       : 'multipart/form-data',
                    "dataType"      : "json",
                    "processData"   : true
                },
                columns: [
                    {"data": "nopol"},
                    {"data": "merk"},
                    {"data": "warna"},
                    {"data": "jenis_kendaraan"},
                    {"data": "tahun_keluar"},
                    {"data": "pegawai.nama"},
                    {"data": "tahun_lelang"},
                    {data: null , render : function ( data, type, row, meta ) {
                        let uuid = row.uuid;
                        let nama = row.nopol;
                        return type === 'display'  ?
                        '<a href="sk/cetak/'+ uuid +'" class="btn btn-sm btn-success"><i class="fas fa-print"></i> SK </a> <button onClick="edit(\''+uuid+'\')" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editmodal"><i class="fas fa-edit"></i></button> <button onClick="hapus(\'' + uuid + '\',\'' + nama + '\')" class="btn btn-sm btn-danger" > <i class="fas fa-trash"></i></button>':
                    data;
                    }}
                ]
            });
            //event form submit        
            $("form").submit(function (e) {
                e.preventDefault()
                let form = $('#modal-body form');
                if($('.modal-title').text() == 'Edit Data'){
                    let url = '{{route("API.kendaraan.update", '')}}'
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
                        url: "{{Route('API.kendaraan.create')}}",
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