<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){

        return view('index');
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


}
