  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
        }
          table{
        border-collapse: collapse;
        width:100%;
      }
         table, th, td{
      }
      th{
        background-color: darkslategray;
        text-align: center;
        color: aliceblue;
      }
      br{
          margin-bottom: 5px !important;
      }
     .judul{
         text-align: center;
     }
     .header{
         margin-bottom: 0px;
         text-align: center;
         height: 150px;
         padding: 0px;
     }
     .pemko{
         width:60px;
     }
     .logo{
         float: left;
         margin-right: 0px;
         width: 15%;
         padding:0px;
         text-align: right;
     }
     .headtext{
         float:right;
         margin-left: 0px;
         width: 75%;
         padding-left:0px;
         padding-right:10%;
     }
     hr{
         margin-top: 10%;
         height: 3px;
         background-color: black;
     }
     .ttd{
         margin-left:70%;
         text-align: center;
         text-transform: uppercase;
     }
    </style>
</head>
<body>
    <div class="header">
            <div class="logo">
                    <img  class="pemko" src="img/logo.png"  >
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
            <h2 style="text-align:center;text-transform: uppercase;">DATA KARYAWAN</h2>
            <table>
                <tr>
                    <td rowspan="6" width="30%" style="padding-right:20px;">
                        <img style="width:250px; height:auto" src="img/pegawai/{{$pegawai->foto}}">
                    </td>
                    <td width="15%">Nama</td>
                    <td>: {{$pegawai->nama}}</td>
                </tr>
                <tr>
                    <td width="15%">NIP</td>
                    <td>: {{$pegawai->NIP}}</td>
                </tr>
                <tr>
                    <td width="15%">Tempat Tanggal Lahir</td>
                    <td>: {{$pegawai->tempat_lahir}} {{$pegawai->tanggal_lahir}}</td>
                </tr>            
                <tr>
                    <td width="15%">Alamat</td>
                    <td>: {{$pegawai->alamat}}</td>
                </tr>
                <tr>
                    <td width="15%">Jenis Kelamin</td>
                    <td>: {{$pegawai->jk}}</td>
                </tr>             <tr>
                    <td width="15%">Golongan Darah</td>
                    <td>: {{$pegawai->golongan_darah}}</td>
                </tr>  
            </table>
            <br>
            <p>Kepegawaian</p>
            <table style="border: 1px solid black;">
                <tr style="padding-right:5px;">
                    <td width="30%">status Kepegawaian</td>
                    <td>: {{$pegawai->status_pegawai}}</td>
               </tr>
               <tr style="padding-right:5px;">
                    <td width="30%">Golongan</td>
                    <td>: {{$pegawai->golongan}}</td>
               </tr>
               <tr>
                    <td width="30%">Masa Kerja </td>
                    <td>: {{$pegawai->mkg}}</td>
               </tr>
            </table>
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
    </div>
</body>
</html>