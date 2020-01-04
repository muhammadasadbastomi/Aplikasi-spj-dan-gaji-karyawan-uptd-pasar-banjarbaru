<?php

namespace App\Http\Controllers;

use App\Jenis_kendaraan;
use App\Pencairan;
use App\Kendaraan;
use Carbon\Carbon;
use App\golongan;
use App\Pegawai;
use App\Jabatan;
use App\Pajak;
use App\Item;
use HCrypt;
use Auth;
use PDF;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){

        return view('index');
    }

    public function userIndex(){

        return view('user.index');
    }

    public function golonganIndex(){

        return view('golongan.index');
    }

    public function jabatanIndex(){

        return view('jabatan.index');
    }

    //Halaman Data Pegawai
    public function pegawaiIndex(){

        return view('pegawai.index');
    }
    //halaman Detail karyawan
    public function pegawaiDetail($uuid){
        $id = HCrypt::decrypt($uuid);
        $pegawai = pegawai::findOrFail($id);
        return view('pegawai.detail', compact('pegawai'));
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
    public function itemFilter(){
    
        return view('standardHarga.filter');
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
    public function jenisKendaraanIndex(){

        return view('jenisKendaraan.index');
    }

    //Halaman Data kendaraan
    public function pencairanIndex(){
    
        return view('pencairan.index');
    }
    public function pencairanAdd(){
        $tgl= Carbon::now()->format('d-m-Y');
        return view('pencairan.add',compact('tgl'));
    }

    public function pencairanStore(Request $request){
        $keperluan = $request->keperluan;

        $user_id = Auth::id();
        $pencairan = new pencairan;
        $pencairan->user_id = $user_id;
        $pencairan->keperluan = $keperluan;
        $pencairan->save();

        $pencairan_id= $pencairan->id;
        $uuid = HCrypt::encrypt($pencairan_id);
        $setuuid = pencairan::findOrFail($pencairan_id);
        $setuuid->uuid = $uuid;
        $setuuid->update();

        if($keperluan == "Belanja Alat Tulis kantor"){
            $no_rek = '1551.201.01.04';
            $tgl= Carbon::now()->format('M');
            $item = item::where('keperluan','Belanja Alat Tulis kantor')->get();
            return view('pencairan.inputKeterangan',compact('keperluan','no_rek','item','tgl','pencairan_id'));
        }elseif($keperluan == "Belanja Peralatan dan Perlengkapan komputer"){
            $no_rek = '1551.201.01.05';
            $tgl= Carbon::now()->format('M');
            $item = item::where('keperluan','Belanja Peralatan dan Perlengkapan komputer')->get();
            return view('pencairan.inputKeteranganKomputer',compact('keperluan','no_rek','item','tgl','pencairan_id'));
        }elseif($keperluan == "Belanja Oprasional Transport Roda 2"){
            $kendaraan = Kendaraan::all();
            $no_rek = '1551.201.01.06';
            return view('pencairan.inputKeteranganRoda',compact('keperluan','no_rek','pencairan_id'));
        }elseif($keperluan == "Belanja Gajih Pegawai Kontrak"){
            $item = item::where('keperluan','Belanja Gajih Pegawai Kontrak')->get();
            $no_rek = '1551.201.01.08';
            $pegawai = Pegawai::where('status_pegawai','Kontrak')->get();
            return view('pencairan.inputKeteranganGajih',compact('keperluan','no_rek','pegawai','pencairan_id'));
        }elseif($keperluan == "Belanja Makan Minum Harian"){
            $no_rek = '1551.201.01.09';
            $pegawai = Pegawai::all();
            return view('pencairan.inputKeteranganMakanminum',compact('keperluan','no_rek','pegawai','pencairan_id'));
        }

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

    public function jabatanCetak(){
        $jabatan=jabatan::all();
        $tgl= Carbon::now()->format('d-m-Y');
        $pdf =PDF::loadView('laporan.dataJabatan', ['jabatan'=>$jabatan,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('Laporan data jabatan.pdf');
    }

    public function jenisKendaraanCetak(){
        $jenis_kendaraan=jenis_kendaraan::all();
        $tgl= Carbon::now()->format('d-m-Y');
        $pdf =PDF::loadView('laporan.datajenisKendaraan', ['jenis_kendaraan'=>$jenis_kendaraan,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('Laporan data jenis Kendaraan.pdf');
    }
 
    
    public function pegawaiCetak(){
        $pegawai=pegawai::all();
        $tgl= Carbon::now()->format('d-m-Y');
        $pdf =PDF::loadView('laporan.dataPegawai', ['pegawai'=>$pegawai,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('Laporan data Pegawai.pdf');
    }

    public function itemCetak(){
        $item=Item::all();
        $tgl= Carbon::now()->format('d-m-Y');
        $pdf =PDF::loadView('laporan.dataItem', ['item'=>$item,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('Laporan data item.pdf');
    }

    public function itemFilterCetak(Request $req){
        $item=Item::where('keperluan', $req->keperluan)->get();
        $tgl= Carbon::now()->format('d-m-Y');
        $pdf =PDF::loadView('laporan.dataFilterItem', ['item'=>$item,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('Laporan data item Filter.pdf');
    }

    public function kendaraanCetak(){
        $kendaraan=kendaraan::all();
        $tgl= Carbon::now()->format('d-m-Y');
        $pdf =PDF::loadView('laporan.dataKendaraan', ['kendaraan'=>$kendaraan,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('Laporan data kendaraan.pdf');
    }
}
