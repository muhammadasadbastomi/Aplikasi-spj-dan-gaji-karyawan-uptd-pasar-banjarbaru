<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){

        return view('index');
    }

    public function pegawaiIndex(){

        return view('pegawai.index');
    }
    public function pegawaiEdit(){

        return view('pegawai.edit');
    }

}
