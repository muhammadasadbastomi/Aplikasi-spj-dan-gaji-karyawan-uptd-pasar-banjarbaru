<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
       .headtext{
           text-align:center;
       }
       .isi{
           margin:auto;
       }
    </style>
</head>

<body>
    <div class="header">
        <div class="headtext">
            <h2 style="margin:0px;">PEMERINTAH KOTA BANJARBARU</h2>
        </div>
        <hr>
        <br>
        <table width="100%">
        <tr>
            <td width="10%">Referensi</td>
            <td width="30%">:-</td>
            <td width="10%">BKU No </td>
            <td>: {{$pencairan->id}} </td>
        </tr>
        <tr>
            <td width="10%">Pembebanan</td>
            <td width="30%">: DPA UPTD Pasar Bauntung</td>
            <td width="13%">BUKTI NO.</td>
            <td>:{{$pencairan->id}}/ BKEL/BAUNTUNG/DISDAG/2020</td>
        </tr>
        <tr>
            <td width="10%">Kegiatan</td>
            <td>: <b>{{$pencairan->keperluan}}</b></td>
        </tr>
        </table>
        <br>
        <br>
        <table class="isi">
        <tr>
            <td width="12%">SUDAH TERIMA DARI</td>
            <td>: Bendahara Pengeluaran Dinas Perdagangan Kota Banjarbaru</td>
        </tr>
        <tr style="margin-bottom:50px;">
            <td width="12%">UANG SEBANYAK</td>
            <td>: <b> Rp. {{$pencairan->total}}</b></td>
        </tr>
        <tr rowspan="3">
        <td width="12%">UNTUK PEMBAYARAN</td>
        <td>: {{$pencairan->keperluan}} Untuk Bulan {{$pencairan->created_at}}</td>
        </tr>
        <tr>
        <td width="12%"></td>
        <td>&nbsp;&nbsp;Pada UPTD Pasar bauntung Banjarbaru</td>
        </tr>
        </table>
        <br>
        <br>
        <table>
        @php
            $pajak = $pencairan->total * 10/100;
            $total = $pencairan->total - $pajak ;
        @endphp
        <tr>
            <td width="10%;">Pajak</td>
            <td>: PPN</td>
        </tr>
        <tr>
            <td width="10%;">Potongan</td>
            <td>: 10% = Rp.{{$pajak}}</td>
        </tr>
        <tr>
        <td width="10%;"></td>
        <td>_______________________</td>
        </tr>
        <tr>

        <td width="10%;">jumlah Pencairan </td>
        <td> <b>Rp. {{$total}}</b></td>
        </tr>
        </table>
        <br><br><br>
        <table width="100%">
        <tr>
            <td width="30%; " style="text-align:center; ">
                Mengetahui / Menyetujui <br>
                Pengguna Anggaran <br>
                <br><br><br><br>
                <p style="text-decoration:underline; margin:2px;">{{$pptk->nama}}</p>
                <p style=" margin:2px;">{{$pptk->NIP}}</p>

            </td>
            <td width="30%" style="text-align:center;">
                Dibayar <br>
                Bendahara Pengeluaran <br>
                <br><br><br><br>
                <p style="text-decoration:underline; margin:2px;">{{$bendahara->nama}}</p>
                <p style=" margin:2px;">{{$bendahara->NIP}}</p>

            </td>
            <td width="20%" style="text-align:center;">
                Penerima
                <br><br><br><br><br>
                <br>
                <br>
                <br>
                <p style="text-decoration:underline; margin:2px;"></p>
                <p style=" margin:2px;"></p>

            </td>
        </tr>
        </table>
    </div>

    <div class="container">
        <div class="isi">
           
        </div>
    </div>
</body>
</html>