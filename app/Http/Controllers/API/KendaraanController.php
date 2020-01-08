<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Redis;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kendaraan;
use HCrypt;

class KendaraanController extends APIController
{
    public function get(){
        $kendaraan = json_decode(redis::get("kendaraan::all"));
        if (!$kendaraan) {
            $kendaraan = kendaraan::with('jenis_kendaraan','pegawai')->get();
            if (!$kendaraan) {
                return $this->returnController("error", "failed get kendaraan data");
            }
            Redis::set("kendaraan:all", $kendaraan);
        }
        return $this->returnController("ok", $kendaraan);
    }

    public function find($uuid){
        $id = HCrypt::decrypt($uuid);
        if (!$id) {
            return $this->returnController("error", "failed decrypt uuid");
        }
        $kendaraan = Redis::get("kendaraan:$id");
        if (!$kendaraan) {
            $kendaraan = kendaraan::with('jenis_kendaraan','pegawai')->where('id',$id)->first();
            if (!$kendaraan){
                return $this->returnController("error", "failed find data kendaraan");
            }
            Redis::set("kendaraan:$id", $kendaraan);
        }
        return $this->returnController("ok", $kendaraan);
    }

    public function create(Request $req){
        $kendaraan = New kendaraan;
        
        // decrypt uuid from $req
        $pegawai_id = HCrypt::decrypt($req->pegawai_id);

        $kendaraan->pegawai_id       =  $pegawai_id;
        $kendaraan->nopol            =  $req->nopol;
        $kendaraan->merk             =  $req->merk;
        $kendaraan->warna            =  $req->warna;
        $kendaraan->jenis_kendaraan  =  $req->jenis_kendaraan;

        $kendaraan->save();
        
        $kendaraan_id= $kendaraan->id;
        
        $uuid = HCrypt::encrypt($kendaraan_id);
        $setuuid = kendaraan::findOrFail($kendaraan_id);
        $setuuid->uuid = $uuid;
            
        $setuuid->update();

        if (!$kendaraan) {
            return $this->returnController("error", "failed create data kendaraan");
        }

        Redis::del("kendaraan:all");
        Redis::set("kendaraan:all",$kendaraan);
        return $this->returnController("ok", $kendaraan);
    }

    public function update($uuid, Request $req){
        $id = HCrypt::decrypt($uuid);

        if (!$id) {
            return $this->returnController("error", "failed decrypt uuid");
        }

        $kendaraan = kendaraan::findOrFail($id);
        
        if (!$kendaraan){
                return $this->returnController("error", "failed find data pelanggan");
            }
        // decrypt uuid from $req
        $pegawai_id = HCrypt::decrypt($req->pegawai_id);

        $kendaraan->pegawai_id          =  $pegawai_id;
        $kendaraan->nopol               =  $req->nopol;
        $kendaraan->merk                =  $req->merk;
        $kendaraan->warna               =  $req->warna;
        $kendaraan->jenis_kendaraan     =  $req->jenis_kendaraan;

        $kendaraan->update();
    
            
        if (!$kendaraan) {
            return $this->returnController("error", "failed find data kendaraan");
        }
        $kendaraan = kendaraan::with('jenis_kendaraan','pegawai')->where('id',$id)->first();
        Redis::del("kendaraan:all");
        Redis::set("kendaraan:$id", $kendaraan);

        return $this->returnController("ok", $kendaraan); 
    }

    public function delete($uuid){
        $id = HCrypt::decrypt($uuid);
        if (!$id) {
            return $this->returnController("error", "failed decrypt uuid");
        }

        $kendaraan = kendaraan::find($id);
        if (!$kendaraan) {
            return $this->returnController("error", "failed find data kendaraan");
        }

        // Need to check realational
        // If there relation to other data, return error with message, this data has relation to other table(s)
        // $image_path = "img/kendaraan/".$kendaraan->foto;  // Value is not URL but directory file path
        // if(File::exists($image_path)) {
        // File::delete($image_path);
        // }
        $delete = $kendaraan->delete();
        if (!$delete) {
            return $this->returnController("error", "failed delete data kendaraan");
        }

        Redis::del("kendaraan:all");
        Redis::del("kendaraan:$id");

        return $this->returnController("ok", "success delete data kendaraan");
    }
}