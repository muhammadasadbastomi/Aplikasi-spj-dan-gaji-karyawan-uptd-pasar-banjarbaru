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
    
    //Halaman Data Pegawai
    public function pegawaiEdit(){

        return view('pegawai.edit');
    }

    //Halaman Data Pegawai
    public function keperluanIndex(){

        return view('keperluan.index');
    }
        
    //Halaman Data Pegawai
    public function keperluanEdit(){
    
        return view('keperluan.edit');
    }


}
