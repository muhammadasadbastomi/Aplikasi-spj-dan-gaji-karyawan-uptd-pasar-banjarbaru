<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Redis;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pegawai;
use HCrypt;

class PegawaiController extends APIController
{
    public function get(){
        $pegawai = json_decode(redis::get("pegawai::all"));
        if (!$pegawai) {
            $pegawai = pegawai::with('golongan','jabatan')->get();
            if (!$pegawai) {
                return $this->returnController("error", "failed get pegawai data");
            }
            Redis::set("pegawai:all", $pegawai);
        }
        return $this->returnController("ok", $pegawai);
    }

    public function find($uuid){
        $id = HCrypt::decrypt($uuid);
        if (!$id) {
            return $this->returnController("error", "failed decrypt uuid");
        }
        $pegawai = Redis::get("pegawai:$id");
        if (!$pegawai) {
            $pegawai = pegawai::with('golongan','jabatan')->where('id',$id)->first();
            if (!$pegawai){
                return $this->returnController("error", "failed find data pegawai");
            }
            Redis::set("pegawai:$id", $pegawai);
        }
        return $this->returnController("ok", $pegawai);
    }

    public function create(Request $req){
        $pegawai = New pegawai;
        

        $pegawai->golongan         =  $req->golongan;
        $pegawai->jabatan          =  $req->jabatan;
        $pegawai->NIP              =  $req->NIP;
        $pegawai->nama             =  $req->nama;
        $pegawai->tempat_lahir     =  $req->tempat_lahir;
        $pegawai->tanggal_lahir    =  $req->tanggal_lahir;
        $pegawai->alamat           =  $req->alamat;
        $pegawai->jk               =  $req->jk;
        $pegawai->agama            =  $req->agama;
        $pegawai->status_pegawai   =  $req->status_pegawai;
        $pegawai->status_kawin     =  $req->status_kawin;
        $pegawai->golongan_darah   =  $req->golongan_darah;
        $pegawai->mkg   =  $req->mkg;
        if($req->foto != null){
            $img = $req->file('foto');
            $FotoExt  = $img->getClientOriginalExtension();
            $FotoName = $req->NIP.' - '.$pegawai->nama;
            $foto   = $FotoName.'.'.$FotoExt;
            $img->move('img/pegawai', $foto);
            $pegawai->foto       = $foto;
        }else{
            
        }

        $pegawai->save();
        
        $pegawai_id= $pegawai->id;
        
        $uuid = HCrypt::encrypt($pegawai_id);
        $setuuid = pegawai::findOrFail($pegawai_id);
        $setuuid->uuid = $uuid;
            
        $setuuid->update();

        if (!$pegawai) {
            return $this->returnController("error", "failed create data pegawai");
        }

        Redis::del("pegawai:all");
        Redis::set("pegawai:all",$pegawai);
        return $this->returnController("ok", $pegawai);
    }

    public function update($uuid, Request $req){
        $id = HCrypt::decrypt($uuid);

        if (!$id) {
            return $this->returnController("error", "failed decrypt uuid");
        }

        $pegawai = pegawai::findOrFail($id);
        
        if (!$pegawai){
                return $this->returnController("error", "failed find data pelanggan");
            }
        
        $pegawai->golongan         =  $req->golongan;
        $pegawai->jabatan          =  $req->jabatan;
        $pegawai->NIP              =  $req->NIP;
        $pegawai->nama             =  $req->nama;
        $pegawai->tempat_lahir     =  $req->tempat_lahir;
        $pegawai->tanggal_lahir    =  $req->tanggal_lahir;
        $pegawai->alamat           =  $req->alamat;
        $pegawai->jk               =  $req->jk;
        $pegawai->status_pegawai   =  $req->status_pegawai;
        $pegawai->status_kawin     =  $req->status_kawin;
        $pegawai->golongan_darah   =  $req->golongan_darah;
        $pegawai->mkg   =  $req->mkg;
        if($req->foto != null){
            $img = $req->file('foto');
            $FotoExt  = $img->getClientOriginalExtension();
            $FotoName = $req->NIP.' - '.$pegawai->nama;
            $foto   = $FotoName.'.'.$FotoExt;
            $img->move('img/pegawai', $foto);
            $pegawai->foto       = $foto;
        }else{
            $pegawai->foto       = $pegawai->foto;
        }

        $pegawai->update();
    
            
        if (!$pegawai) {
            return $this->returnController("error", "failed find data pegawai");
        }
        $pegawai = pegawai::with('golongan','jabatan')->where('id',$id)->first();
        Redis::del("pegawai:all");
        Redis::set("pegawai:$id", $pegawai);

        return $this->returnController("ok", $pegawai); 
    }

    public function delete($uuid){
        $id = HCrypt::decrypt($uuid);
        if (!$id) {
            return $this->returnController("error", "failed decrypt uuid");
        }

        $pegawai = pegawai::find($id);
        if (!$pegawai) {
            return $this->returnController("error", "failed find data pegawai");
        }

        // Need to check realational
        // If there relation to other data, return error with message, this data has relation to other table(s)
        $image_path = "img/pegawai/".$pegawai->foto;  // Value is not URL but directory file path
        if(File::exists($image_path)) {
        File::delete($image_path);
        }
        $delete = $pegawai->delete();
        if (!$delete) {
            return $this->returnController("error", "failed delete data pegawai");
        }

        Redis::del("pegawai:all");
        Redis::del("pegawai:$id");

        return $this->returnController("ok", "success delete data pegawai");
    }
}