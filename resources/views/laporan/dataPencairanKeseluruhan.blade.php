<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {}
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        table,
        th,
        td {
            border: 1px solid #708090;
        }
        th {
            background-color: darkslategray;
            text-align: center;
            color: aliceblue;
        }
        td {}
        br {
            margin-bottom: 5px !important;
        }
        .judul {
            text-align: center;
        }
        .header {
            margin-bottom: 0px;
            text-align: center;
            height: 150px;
            padding: 0px;
        }
        .pemko {
            width: 75px;
        }
        .logo {
            float: left;
            margin-right: 0px;
            width: 15%;
            padding: 0px;
            text-align: right;
        }
        .headtext {
            float: right;
            margin-left: 0px;
            width: 75%;
            padding-left: 0px;
            padding-right: 10%;
        }
        hr {
            margin-top: 10%;
            height: 3px;
            background-color: black;
        }
        .ttd {
            margin-left: 70%;
            text-align: center;
            text-transform: uppercase;
        }
        .text-center{
            text-align:center;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="logo">
            <img class="pemko" src="img/logo.png">
        </div>
        <div class="headtext">
            <h2 style="margin:0px;">PEMERINTAH KOTA BANJARBARU</h2>
            <H3 style="margin:0px;">UPTD PASAR BAUNTUNG</H3>
            <p style="margin:0px;">Alamat : Pasar Bauntung Banjar Baru Lantai 2, Jalan Lanan, Loktabat Utara, Kec. Banjarbaru Utara, Kota Banjar Baru, Kalimantan Selatan 70714</p>
        </div>
        <hr>
    </div>

    <div class="container">
        <div class="isi">
            <h2 style="text-align:center;">DATA PENCAIRAN</h2>
            <table class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>Keperluan </th>
                        <th>Tanggal Pencairan</th>
                        <th>Total</th>
                        <th>Diinput Oleh</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pencairan as $r)

                    <tr>
                        <td>{{$r->keperluan}}</td>
                        <td>{{$r->created_at}} </td>
                        <td>Rp.{{$r->total}} </td>
                        <td>{{$r->user->username}}</td>
                    </tr>
                    @endforeach
                    </tfoot>
            </table>
        </div>
        <br>
            <br>
            <div class="ttd">
                <h5>
                    <p>Banjarbaru, {{$tgl}}</p>
                </h5>
                <h5>{{$pptk->jabatan}}</h5>
                <br>
                <br>
                <h5 style="text-decoration:underline;">{{$pptk->nama}}</h5>
                <h5>NIP.{{$pptk->NIP}}</h5>
            </div>
    </div>
</body>
</html>