<?php

namespace App\Http\Controllers;
use App\Pajak;
use App\golongan;
use Carbon\Carbon;
use PDF;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){

        return view('index');
    }
    public function golonganIndex(){

        return view('golongan.index');
    }
    //Halaman Data Pegawai
    public function pegawaiIndex(){

        return view('pegawai.index');
    }
    //halaman Detail karyawan
    public function pegawaiDetail(){

        return view('pegawai.detail');
    }

    //Halaman Data Pegawai
    public function pegawaiEdit(){

        return view('pegawai.edit');
    }

    //Halaman Data Keperluan
    public function standardHargaIndex(){

        return view('standardHarga.index');
    }
        
    //Halaman Data standard harga
    public function standardHargaEdit(){
    
        return view('standardHarga.edit');
    }
    //Halaman Data standard harga
    public function keperluanIndex(){

        return view('keperluan.index');
    }
        
    //Halaman Data Keperluan
    public function keperluanEdit(){
    
        return view('keperluan.edit');
    }

    //Halaman Data pajak
    public function pajakIndex(){

        return view('pajak.index');
    }
        
    //Halaman Data pajak
    public function pajakEdit(){
    
        return view('pajak.edit');
    }

    //Halaman Data kendaraan
    public function kendaraanIndex(){
    
        return view('kendaraan.index');
    }
    //Halaman Data kendaraan
    public function kendaraanEdit(){
    
        return view('kendaraan.edit');
    }
    //Halaman Data kendaraan
    public function pencairanIndex(){
    
        return view('pencairan.index');
    }
    public function pencairanAdd(){
    
        return view('pencairan.add');
    }
    public function inputKeterangan(){
    
        return view('pencairan.inputKeterangan');
    }
    //Halaman Data kendaraan
    public function pencairanEdit(){
    
        return view('pencairan.edit');
    }

    public function pajakCetak(){
        $pajak=pajak::all();
        $tgl= Carbon::now()->format('d-m-Y');
        $pdf =PDF::loadView('laporan.dataPajak', ['pajak'=>$pajak,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('Laporan data Pajak.pdf');
    }

    public function golonganCetak(){
        $golongan=golongan::all();
        $tgl= Carbon::now()->format('d-m-Y');
        $pdf =PDF::loadView('laporan.dataGolongan', ['golongan'=>$golongan,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('Laporan data golongan.pdf');
    }


}
