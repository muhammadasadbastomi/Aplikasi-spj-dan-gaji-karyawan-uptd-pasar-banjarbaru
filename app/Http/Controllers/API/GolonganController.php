<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Golongan;
use HCrypt;
use Illuminate\Support\Facades\Redis;

class GolonganController extends APIController
{
    public function get(){
        $golongan = json_decode(redis::get("golongan::all"));
        if (!$golongan) {
            $golongan = golongan::all();
            if (!$golongan) {
                return $this->returnController("error", "failed get golongan data");
            }
            Redis::set("golongan:all", $golongan);            

        }
        return $this->returnController("ok", $golongan);
    }

    public function find($uuid){
        $id = HCrypt::decrypt($uuid);
        if (!$id) {
            return $this->returnController("error", "failed decrypt uuid");
        }

        $golongan = Redis::get("golongan:$id");
        if (!$golongan) {
            $golongan = golongan::find($id);
            if (!$golongan){
                return $this->returnController("error", "failed find data golongan");
            }
            Redis::set("golongan:$id", $golongan);
        }

        return $this->returnController("ok", $golongan);
    }

    public function create(Request $req){
        $golongan = golongan::create($req->all());
        $golongan_id= $golongan->id;
        $uuid = HCrypt::encrypt($golongan_id);
        $setuuid = golongan::findOrFail($golongan_id);
        $setuuid->uuid = $uuid;
        $setuuid->update();
        if (!$golongan) {
            return $this->returnController("error", "failed create data golongan");
        }
        Redis::del("golongan:all");
        return $this->returnController("ok", $golongan);
    }

    public function update($uuid, Request $req){
        $id = HCrypt::decrypt($uuid);
        if (!$id) {
            return $this->returnController("error", "failed decrypt uuid");
        }

        $golongan = golongan::findOrFail($id);
        if (!$golongan) {
            return $this->returnController("error", "failed find data golongan");
        }

        $golongan->golongan     = $req->golongan;
        $golongan->keterangan    = $req->keterangan;
        $golongan->update();
        if (!$golongan) {
            return $this->returnController("error", "failed find data golongan");
        }

        Redis::del("golongan:all");
        Redis::set("golongan:$id", $golongan);

        return $this->returnController("ok", $golongan);
    }

    public function delete($uuid){
        $id = HCrypt::decrypt($uuid);
        if (!$id) {
            return $this->returnController("error", "failed decrypt uuid");
        }

        $golongan = golongan::find($id);
        if (!$golongan) {
            return $this->returnController("error", "failed find data golongan");
        }

        // Need to check realational
        // If there relation to other data, return error with message, this data has relation to other table(s)

        $delete = $golongan->delete();
        if (!$delete) {
            return $this->returnController("error", "failed delete data golongan");
        }

        Redis::del("golongan:all");
        Redis::del("golongan:$id");
        return $this->returnController("ok", "success delete data golongan");
    }
}
