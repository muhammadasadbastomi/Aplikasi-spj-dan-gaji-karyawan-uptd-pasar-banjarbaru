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
                                <a href="" class="btn btn-outline-info"><i class="mdi mdi-printer"></i> cetak</a>
                                <a href="" class="btn btn-outline-danger" data-toggle="modal" data-target="#mediumModal"><i class="mdi mdi-add"></i>+ tambah data</a>               
                                </div>
                                <br>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
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

<!-- Modal -->
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="tambahData" aria-hidden="true">
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
      <div class="form-group m-t-20">
        <label> Golongan</label>
        <input type="text" class="form-control date-inputmask" name="golongan" placeholder="">
     </div>
     <div class="form-group">
        <label>Keterangan</label>
        <input type="text" class="form-control phone-inputmask" name="keterangan" placeholder="contoh (10)">
     </div>
    
    </div>
      <div class="modal-footer">
        <a href=""  class="" ><i class="mdi mdi-close-circle-outline"></i> Batal</a>
        <button type="submit" class="btn btn-primary"> <i class="mdi mdi-content-save-outline"></i> Simpan</button>
    </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
function hapus(id){
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    Swal.fire({
                title: 'apa anda yakin?',
                text: " Menghapus Kecamatan data ",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'hapus data',
                cancelButtonText: 'batal',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url : "{{ url('/api/golongan')}}" + '/' + id,
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
                    $('#zero_config').DataTable().ajax.reload(null, false);
                },
                    })
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    Swal.fire(
                        'Dibatalkan',
                        'data batal dihapus',
                        'error'
                    )
                }
            })
}

$(document).ready(function() {
    $('#zero_config').DataTable( {
        responsive: true,
        processing: true,
        serverSide: true,
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
            {data: null, render : function ( data, type, row, meta ) {
                var id = data.id;
                return type === 'display'  ?
                    '<a href="" class="btn btn-sm btn-outline-primary" ><i class="ti-pencil"></i></a> <button onclick="hapus(\'' +id+'\')" class="btn btn-sm btn-outline-danger" > <i class="ti-trash"></i></button>':
            data;
            }}
        ]
    });
    $("form").submit(function (e) {
        e.preventDefault()
        var form = $('#modal-body form');
        $.ajax({
                url: "{{Route('API.golongan.create')}}",
                type: "post",
                data: $(this).serialize(),
                success: function (response) {
                    form.trigger('reset');
                    $('#mediumModal').modal('hide');
                    $('#zero_config').DataTable().ajax.reload();
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
} );
} );

</script>
@endsection