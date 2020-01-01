@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Data Pegawai</h4>
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
                                <h5 class="card-title">Tabel Data Pegawai</h5>
                                <div class="text-right">
                                <a href="{{route('pegawaiCetak')}}" class="btn btn-outline-info"><i class="mdi mdi-printer"></i> cetak</a>
                                <a href="" class="btn btn-outline-danger" id="tambah" data-toggle="modal" ><i class="mdi mdi-add"></i>+ tambah data</a>               
                                </div>
                                <br>
                                <div class="table-responsive">
                                <table id="datatable" class="text-center table table-striped table-bordered">
                                    <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>NIP</th>
                                                <th>Golongan</th>
                                                <th>Jabatan</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Status Kepegawaian</th>
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

<!-- Modal -->
<div class="modal fade" id="tambahData"  role="dialog"  aria-hidden="true">
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
      <input type="hidden" class="form-control date-inputmask" name="id" id="id" placeholder="Masukan NIP/NRTK">
      <div class="form-group m-t-20">
        <label> NIP/NRTK</label>
        <input type="text" class="form-control date-inputmask" name="NIP" id="NIP" placeholder="Masukan NIP/NRTK">
     </div>
     <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control phone-inputmask" name="nama" id="nama" placeholder="Nama Pegawai">
     </div>
     <div class="form-group m-t-20">
        <label> Golongan</label>
        <select name="golongan_id" id="golongan_id" class="form-control">
            <option value=""> -- Pilih Golongan --</option>
        </select>
     </div>
     <div class="form-group m-t-20">
        <label> Jabatan</label>
        <select name="jabatan_id" id="jabatan_id" class="form-control">
            <option value=""> -- Pilih Jabatan --</option>
        </select>
     </div>
     <div class="form-group m-t-20">
        <label> Tempat Lahir</label>
        <input type="text" class="form-control date-inputmask" name="tempat_lahir" id="tempat_lahir" placeholder="Masukan NIP/NRTK">
     </div>
     <div class="form-group">
        <label>Tanggal Lahir </label>
        <input type="date" class="form-control international-inputmask" name="tanggal_lahir" id="tanggal_lahir" placeholder="Pangkat/Golongan">
     </div>
     <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" id="alamat" class="form-control"></textarea>
     </div>
     <div class="row" style="margin-left:15px">
        <div class="col-lg-6">
            <div class="form-group">
                <input class="form-check-input" type="radio" name="jk" id="jk1" value="Laki-laki" >
                <label class="form-check-label" for="jk">
                    Laki - laki
                </label>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <input class="form-check-input" type="radio" name="jk" id="jk2" value="Perempuan" >
                <label class="form-check-label" for="jk">
                    Perempuan
                </label>
            </div>
        </div>
    </div>
    <div class="form-group"><label  class=" form-control-label">Agama</label><input type="text" id="agama" name="agama" placeholder="" class="form-control"></div>
        <div class="form-group"><label  class=" form-control-label">Status Kepegawaian</label>
            <select name="status_pegawai" id="status_pegawai" class="form-control">
                <option value="">-- pilih Status Kepegawaian --</option>
                <option value="PNS">PNS</option>
                <option value="PTT">PTT</option>
                <option value="Kontrak">Kontrak</option>
            </select>
        </div>                    
        <div class="form-group"><label  class=" form-control-label">Status Perkawinan</label>
            <select name="status_kawin" id="status_kawin" class="form-control">
                <option value="">-- pilih Status Perkawinan --</option>
                <option value="Menikah">Menikah</option>
                <option value="Belum Menikah">Belum Menikah</option>
                <option value="janda/Duda"> janda / Duda </option>
            </select>
        </div>
        <div class="form-group"><label  class=" form-control-label">golongan Darah</label><input type="text" id="golongan_darah" name="golongan_darah" placeholder="" class="form-control"></div>
        <div class="form-group"><label  class=" form-control-label">Foto</label><input type="file" id="foto" name="foto" placeholder="" class="form-control"></div>
    </div>
      <div class="modal-footer">
        <a href=""  class="" data-dismiss="modal"><i class="mdi mdi-close-circle-outline"></i> Batal</a>
        <button type="submit" class="btn btn-primary"> <i class="mdi mdi-content-save-outline"></i> Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>

    getGolongan = () => {
        $.ajax({
                type: "GET",
                url: "{{ url('/api/golongan')}}",
                beforeSend: false,
                success : function(returnData) {
                    $.each(returnData.data, function (index, value) {
                    $('#golongan_id').append(
                        '<option value="'+value.uuid+'">'+value.golongan+'</option>'
                    )
                })
            }
        })
    }
    getJabatan = () => {
        $.ajax({
                type: "GET",
                url: "{{ url('/api/jabatan')}}",
                beforeSend: false,
                success : function(returnData) {
                    $.each(returnData.data, function (index, value) {
                    $('#jabatan_id').append(
                        '<option value="'+value.uuid+'">'+value.jabatan+'</option>'
                    )
                })
            }
        })
    }
    getGolongan();
    getJabatan();
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
                            url : "{{ url('/api/pegawai')}}" + '/' + uuid,
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
            $('#unit_kerja_id').val('');
            $('#golongan_id').val('');
            $('#jabatan_id').val('');
            $('#NIP').val('');
            $('#nama').val('');
            $('#tempat_lahir').val('');  
            $('#tanggal_lahir').val('');
            $('#alamat').val('');   
            $('#status_pegawai').val('');     
            $('#status_kawin').val('');    
            $('#golongan_darah').val('');                     
            $('#agama').val('');                     
            $('#foto').val('');                                     
            $('#btn-form').text('Simpan Data');
            $('#tambahData').modal('show');
        })
        //event btn edit klik
        edit = uuid =>{
            $.ajax({
                type: "GET",
                url: "{{ url('/api/pegawai')}}" + '/' + uuid,
                beforeSend: false,
                success : function(returnData) {
                    $('.modal-title').text('Edit Data');
                    $('#id').val(returnData.data.uuid);
                    $('#golongan_id').val(returnData.data.golongan.uuid);
                    $('#jabatan_id').val(returnData.data.jabatan.uuid);
                    $('#NIP').val(returnData.data.NIP);
                    $('#nama').val(returnData.data.nama);
                    $('#tempat_lahir').val(returnData.data.tempat_lahir);  
                    $('#tanggal_lahir').val(returnData.data.tanggal_lahir);
                    $('#alamat').val(returnData.data.alamat);
                    $("input[name=jk][value=" + returnData.data.jk + "]").attr('checked', 'checked');   
                    $('#status_pegawai').val(returnData.data.status_pegawai);     
                    $('#status_kawin').val(returnData.data.status_kawin);    
                    $('#golongan_darah').val(returnData.data.golongan_darah);                     
                    $('#agama').val(returnData.data.agama);                     
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
                    "url"           : "{{route('API.pegawai.get')}}",
                    "dataSrc"       : "data",
                    "contentType"   : "false",
                    "enctype"       : 'multipart/form-data',
                    "dataType"      : "json",
                    "processData"   : true
                },
                columns: [
                    {"data": "nama"},
                    {"data": "NIP"},
                    {"data": "golongan.golongan"},
                    {"data": "jabatan.jabatan"},
                    {"data": "jk"},
                    {"data": "status_pegawai"},
                    {data: null , render : function ( data, type, row, meta ) {
                        let uuid = row.uuid;
                        let nama = row.nama;
                        return type === 'display'  ?
                        ' <a href="/pegawai/detail/ '+uuid+'" class="btn btn-sm btn-info"><i class="fas fa-eye"></i><a> <button onClick="edit(\''+uuid+'\')" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editmodal"><i class="fas fa-edit"></i></button> <button onClick="hapus(\'' + uuid + '\',\'' + nama + '\')" class="btn btn-sm btn-danger" > <i class="fas fa-trash"></i></button>':
                    data;
                    }}
                ]
            });
            //event form submit        
            $("form").submit(function (e) {
                e.preventDefault()
                let form = $('#modal-body form');
                if($('.modal-title').text() == 'Edit Data'){
                    let url = '{{route("API.pegawai.update", '')}}'
                    let id = $('#id').val();
                    $.ajax({
                        url: url+'/'+id,
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
                        url: "{{Route('API.pegawai.create')}}",
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