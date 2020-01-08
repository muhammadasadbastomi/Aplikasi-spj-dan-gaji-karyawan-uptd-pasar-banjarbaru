@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">input {{$keperluan}} - {{$no_rek}}</h4>
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
                                        <label> input {{$keperluan}} - {{$no_rek}}</label>
                                        <input type="hidden" name="keperluan" id="keperluan" value="{{$keperluan}}">
                                        {{-- <input type="hidden" name="item_id" id="item_id" value="{{$item_id}}"> --}}
                                    </div>
                                    <div class="form-group m-t-20">
                                        <label style="margin-right:30px;"> Pencairan Bulan :</label>
                                        <label>{{$tgl}}</label>
                                    </div>
                                    <div class="form-group">
                                        <label>Item </label>
                                        <select name="item_id" id="item_id" class="form-control">
                                            @foreach($item as $p)
                                            <option value="{{$p->uuid}}">{{$p->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group m-t-20">
                                        <label> Jumlah Karyawan Kontrak</label>
                                         : <label for="" class="badge badge-success"> {{$pegawai->count()}} Karyawan Kontrak </label>
                                         <input type="hidden" name="volume" id="volume" value="{{$pegawai->count()}}">
                                    </div>
                                    <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-success">Selesai, buat pencairan</button>
                                    </form>                               
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
                                window.location.replace("/pencairanIndex");
                            },
                            error:function(response){
                                console.log(response);
                            }
                        })
                } );
    </script>
@endsection