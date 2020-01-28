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
use App\pptk;
use App\User;
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
    //halaman Detail pegawai
    public function pegawaiDetail($uuid){
        $id = HCrypt::decrypt($uuid);
        $pegawai = pegawai::findOrFail($id);
        $now = carbon::now()->format('Y');
        return view('pegawai.detail', compact('pegawai','now'));
    }

    //Halaman Data Pegawai
    public function pegawaiFilterGolongan(){

        return view('pegawai.filterGolongan');
    }

    //Halaman Data Pegawai
    public function pegawaiFilterJabatan(){

        return view('pegawai.filterJabatan');
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
    public function kendaraanFilter(){
    
        return view('kendaraan.filter');
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
    public function pencairanDetail($uuid){
        $id = HCrypt::Decrypt($uuid);
        $pencairan = pencairan::findOrfail($id);
        $keperluan = $pencairan->keperluan;

        if($keperluan == "Belanja Oprasional Transport Roda 2"){

            return view('pencairan.detailBBM',compact('pencairan'));
        }else{
            
            return view('pencairan.detail',compact('pencairan'));
        }
        // return view('pencairan.detail',compact('pencairan'));
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
            $tgl= Carbon::now()->formatLocalized("%B");
            $item = item::where('keperluan','Belanja Alat Tulis kantor')->get();
            return view('pencairan.inputKeterangan',compact('keperluan','no_rek','item','tgl','pencairan_id'));
        }elseif($keperluan == "Belanja Peralatan dan Perlengkapan komputer"){
            $no_rek = '1551.201.01.05';
            $tgl= Carbon::now()->formatLocalized("%B");
            $item = item::where('keperluan','Belanja Peralatan dan Perlengkapan komputer')->get();
            return view('pencairan.inputKeterangan',compact('keperluan','no_rek','item','tgl','pencairan_id'));
        }elseif($keperluan == "Belanja Oprasional Transport Roda 2"){
            $kendaraan = Kendaraan::where('jenis_kendaraan','Oprasional Transport Roda 2')->get();
            $no_rek = '1551.201.01.06';
            $tgl= Carbon::now()->formatLocalized("%B");
            $item = item::where('keperluan','Belanja Oprasional Transport Roda 2')->get();
            return view('pencairan.inputKeteranganRoda',compact('item','tgl','keperluan','kendaraan','no_rek','pencairan_id'));
        }elseif($keperluan == "Belanja Oprasional Transport Roda 4"){
            $kendaraan = Kendaraan::where('jenis_kendaraan','Oprasional Transport Roda 4')->get();
            $no_rek = '1551.201.01.06';
            $tgl= Carbon::now()->formatLocalized("%B");
            $item = item::where('keperluan','Belanja Oprasional Transport Roda 2')->get();
            return view('pencairan.inputKeteranganRoda',compact('item','tgl','keperluan','kendaraan','no_rek','pencairan_id'));
        }elseif($keperluan == "Belanja Gajih Pegawai Kontrak"){
            $item = item::where('keperluan','Belanja Gajih Pegawai Kontrak')->get();
            $no_rek = '1551.201.01.08';
            $tgl= Carbon::now()->formatLocalized("%B");
            $pegawai = Pegawai::where('status_pegawai','Kontrak')->get();
            return view('pencairan.inputKeteranganGajih',compact('keperluan','pegawai','no_rek','item','tgl','pencairan_id'));
        }elseif($keperluan == "Belanja Makan Minum Harian"){
            $item = item::where('keperluan','Belanja Makan Minum Harian')->get();
            $no_rek = '1551.201.01.08';
            $tgl= Carbon::now()->formatLocalized("%B");
            $pegawai = Pegawai::all();
            return view('pencairan.inputKeteranganMakanminum',compact('keperluan','pegawai','no_rek','item','tgl','pencairan_id'));
        }

    }

    public function inputKeterangan(){
    
        return view('pencairan.inputKeterangan');
    }
    //Halaman Data kendaraan
    public function pencairanFilter(){
        
        return view('pencairan.filter');
    }

    //Halaman Data kendaraan
    public function pencairanFilterWaktu(){
        
        return view('pencairan.filterWaktu');
    }

    //Halaman Data kendaraan
    public function pptkIndex(){
    
        return view('pptk.index');
    }

    public function pajakCetak(){
        $pajak=pajak::all();
        $tgl= Carbon::now()->format('d-m-Y');
        $pptk = pptk::where('jabatan','Kepala UPT')->first();
        $pdf =PDF::loadView('laporan.dataPajak', ['pptk'=>$pptk,'pajak'=>$pajak,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('Laporan data Pajak.pdf');
    }

    public function golonganCetak(){
        $golongan=golongan::all();
        $tgl= Carbon::now()->format('d-m-Y');
        $pptk = pptk::where('jabatan','Kepala UPT')->first();
        $pdf =PDF::loadView('laporan.dataGolongan', ['pptk'=>$pptk,'golongan'=>$golongan,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('Laporan data golongan.pdf');
    }

    public function jabatanCetak(){
        $jabatan=jabatan::all();
        $tgl= Carbon::now()->format('d-m-Y');
        $pptk = pptk::where('jabatan','Kepala UPT')->first();
        $pdf =PDF::loadView('laporan.dataJabatan', ['pptk'=>$pptk,'jabatan'=>$jabatan,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('Laporan data jabatan.pdf');
    }
 
    public function pegawaiCetak(){
        $pegawai=pegawai::all();
        $tgl= Carbon::now()->format('d-m-Y');
        $pptk = pptk::where('jabatan','Kepala UPT')->first();
        $pdf =PDF::loadView('laporan.dataPegawai', ['pptk'=>$pptk,'pegawai'=>$pegawai,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('Laporan data Pegawai.pdf');
    }

    public function itemCetak(){
        $item=Item::all();
        $tgl= Carbon::now()->format('d-m-Y');
        $pptk = pptk::where('jabatan','Kepala UPT')->first();
        $pdf =PDF::loadView('laporan.dataItem', ['pptk'=>$pptk,'item'=>$item,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('Laporan data item.pdf');
    }

    public function itemFilterCetak(Request $req){
        $item=Item::where('keperluan', $req->keperluan)->get();
        $tgl= Carbon::now()->format('d-m-Y');
        $pptk = pptk::where('jabatan','Kepala UPT')->first();
        $pdf =PDF::loadView('laporan.dataFilterItem', ['pptk'=>$pptk,'item'=>$item,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('Laporan data item Filter.pdf');
    }

    public function kendaraanCetak(){
        $kendaraan=kendaraan::all();
        $tgl= Carbon::now()->format('d-m-Y');
        $pptk = pptk::where('jabatan','Kepala UPT')->first();
        $pdf =PDF::loadView('laporan.dataKendaraan', ['pptk'=>$pptk,'kendaraan'=>$kendaraan,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('Laporan data kendaraan.pdf');
    }

    public function pptkCetak(){
        $pptk=pptk::all();
        $tgl= Carbon::now()->format('d-m-Y');
        $pdf =PDF::loadView('laporan.dataPptk', ['pptk'=>$pptk,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('Laporan data pptk.pdf');
    }

    public function userCetak(){
        $user=user::all();
        $tgl= Carbon::now()->format('d-m-Y');
        $pptk = pptk::where('jabatan','Kepala UPT')->first();
        $pdf =PDF::loadView('laporan.datauser', ['pptk'=>$pptk,'user'=>$user,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('Laporan data user.pdf');
    }

    public function notaPencairan($id){
        $pencairan=pencairan::findOrFail($id);
        $tgl= Carbon::now()->format('d-m-Y');
        $bendahara = pptk::where('jabatan','Bendahara Pengeluaran')->first();
        $pptk = pptk::where('jabatan','Kepala UPT')->first();
        $pdf =PDF::loadView('laporan.notaPencairan', ['bendahara'=>$bendahara,'pptk'=>$pptk,'pencairan'=>$pencairan,'tgl'=>$tgl]);
        return $pdf->stream('Laporan notaPencairan.pdf');
    }

    public function pencairanCetak(){
        $pencairan=pencairan::all();
        $tgl= Carbon::now()->format('d-m-Y');
        $pptk = pptk::where('jabatan','Kepala UPT')->first();
        $pdf =PDF::loadView('laporan.dataPencairanKeseluruhan', ['pptk'=>$pptk,'pencairan'=>$pencairan,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('Laporan data pencairan.pdf');
    }

    public function pencairanFilterCetak(Request $request){
        $pencairan=pencairan::where('keperluan',$request->keperluan)->get();
        $tgl= Carbon::now()->format('d-m-Y');
        $pptk = pptk::where('jabatan','Kepala UPT')->first();
        $pdf =PDF::loadView('laporan.dataPencairanFilter', ['pptk'=>$pptk,'pencairan'=>$pencairan,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('Laporan data pencairan.pdf');
    }

    public function pegawaiFilterGolonganCetak(Request $request){
        $pegawai=pegawai::where('golongan',$request->golongan_id)->get();
        $tgl= Carbon::now()->format('d-m-Y');
        $pptk = pptk::where('jabatan','Kepala UPT')->first();
        $pdf =PDF::loadView('laporan.pegawaiFilterGolongan', ['pptk'=>$pptk,'pegawai'=>$pegawai,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('Laporan data pegawai Filter Golongan.pdf');
    }

    public function pegawaiFilterJabatanCetak(Request $request){
        $pegawai=pegawai::where('jabatan',$request->jabatan)->get();
        $tgl= Carbon::now()->format('d-m-Y');
        $pptk = pptk::where('jabatan','Kepala UPT')->first();
        $pdf =PDF::loadView('laporan.pegawaiFilterJabatan', ['pptk'=>$pptk,'pegawai'=>$pegawai,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('Laporan data pegawai Filter Golongan.pdf');
    }

    public function profilPegawaiCetak($id){
        $pegawai=pegawai::findOrFail($id);
        $tgl= Carbon::now()->format('d-m-Y');
        $pptk = pptk::where('jabatan','Kepala UPT')->first();
        $pdf =PDF::loadView('laporan.pegawaiProfil', ['pptk'=>$pptk,'pegawai'=>$pegawai,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('Laporan data profil pegawai.pdf');
    }
    
    public function skCetak($uuid){
        $id = HCrypt::decrypt($uuid);
        $kendaraan=kendaraan::findOrFail($id);
        $tgl= Carbon::now()->format('d-m-Y');
        $pptk = pptk::where('jabatan','Kepala UPT')->first();
        $pdf =PDF::loadView('laporan.skKendaraan', ['pptk'=>$pptk,'kendaraan'=>$kendaraan,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('Laporan SK pemegang kendaraan.pdf');
    }

    public function pencairanFilterWaktuCetak(Request $request){
        $pencairan = Pencairan::whereMonth('created_at', '=', $request->bulan)->get();
        $tgl= Carbon::now()->format('d-m-Y');
        $pptk = pptk::where('jabatan','Kepala UPT')->first();
        $pdf =PDF::loadView('laporan.pencairanBulan', ['pptk'=>$pptk,'pencairan'=>$pencairan,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('Laporan Pencairan Perbulan.pdf');
    }

    public function kendaraanFilterCetak(Request $request){
        $kendaraan=kendaraan::where('jenis_kendaraan',$request->jenis_kendaraan)->get();
        $tgl= Carbon::now()->format('d-m-Y');
        $pptk = pptk::where('jabatan','Kepala UPT')->first();
        $pdf =PDF::loadView('laporan.kendaraanFilter', ['pptk'=>$pptk,'kendaraan'=>$kendaraan,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('Laporan data kendaraan filter.pdf');
    }
}
