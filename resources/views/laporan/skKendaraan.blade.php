  
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
            <h3 style="text-align:center;text-transform: uppercase; margin:0px;">SURAT KEPUTUSAN</h3>
            <h4 style="text-align:center;text-transform: uppercase; margin:0px;">tentang</h4>
            <h3 style="text-align:center;text-transform: uppercase; margin:0px;">PENUNJUKAN PEGAWAI PEMEGANG ASET DINAS UPT.PASAR BAUNTUNG</h3>
           <br>
            <table>
                <tr>
                    <td width="15%" style="top:0%;">Menimbang : <br><br><br><br></td>
                    <td style="text-align:justify ">    bahwa untuk melaksanakan ketentuan dalam Pasal 105
                            Peraturan Pemerintah Nomor 27 Tahun 2014 tentang
                            Pengelolaan Barang Milik Negara/Daerah dan Peraturan
                            Menteri Dalam Negeri Nomor 19 Tahun 2016 tentang
                            Pedoman Pengelolaan Barang Milik Daerah, maka
                            pengelolaan barang milik daerah perlu ditetapkan dalam
                            Peraturan Daerah. <br> <br>
                    </td>
                </tr>
                <tr>
                    <td width="15%"></td>
                    <td style="text-align:justify">     bahwa Peraturan Daerah Nomor 14 Tahun 2007 tentang
                                                        Pengelolaan Barang Milik Daerah sudah tidak sesuai
                                                        dengan ketentuan peraturan perundang-undangan
                                                        sehingga perlu dilakukan penyesuaian.
                    </td>
                </tr>
            </table>

            <p>Dengan ini menyerahkan aset Dinas Berupa Kendaraan Roda / Roda 4 Dengan Keterangan Sebagai Berikut :</p>
            <table width="50%;" style="padding-left:5%">
                <tr>
                    <td width="20%">Nopol</td>
                    <td>:{{$kendaraan->nopol}}</td>
                </tr>
                <tr>
                    <td width="20%">Merk</td>
                    <td>:{{$kendaraan->merk}}</td>
                </tr>
                <tr>
                    <td width="20%">Tahun</td>
                    <td>:{{$kendaraan->tahun_keluar}}</td>
                </tr>
            </table>
            <p>akan diserahkan kepada pegawai pemegang aset :</p>
            <table width="50%" style="padding-left:5%">
                <tr>
                    <td width="20%">Nama</td>
                    <td>:{{$kendaraan->pegawai->nama}}</td>
                </tr>
                <tr>
                    <td width="20%">NIP</td>
                    <td>:{{$kendaraan->pegawai->NIP}}</td>
                </tr>
            </table>
            <p>Demikian Surat ini dibuat, mohon untuk menjadi pedoman untuk pelaksanaan pendataan dan kegiatan yang berhubungan dengan pemegang aset UPTD. PASAR BAUNTUNG BANJARBARU.</p>
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