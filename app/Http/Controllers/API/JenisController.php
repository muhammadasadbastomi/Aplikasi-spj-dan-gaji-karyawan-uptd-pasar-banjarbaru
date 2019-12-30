<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jenis_kendaraan;
use HCrypt;
use Illuminate\Support\Facades\Redis;

class JenisController extends APIController
{
    public function get(){
        $jenis_kendaraan = json_decode(redis::get("jenis_kendaraan::all"));
        if (!$jenis_kendaraan) {
            $jenis_kendaraan = jenis_kendaraan::all();
            if (!$jenis_kendaraan) {
                return $this->returnController("error", "failed get jenis kendaraan data");
            }
            Redis::set("jenis_kendaraan:all", $jenis_kendaraan);            

        }
        return $this->returnController("ok", $jenis_kendaraan);
    }

    public function find($uuid){
        $id = HCrypt::decrypt($uuid);
        if (!$id) {
            return $this->returnController("error", "failed decrypt uuid");
        }

        $jenis_kendaraan = Redis::get("jenis_kendaraan:$id");
        if (!$jenis_kendaraan) {
            $jenis_kendaraan = jenis_kendaraan::find($id);
            if (!$jenis_kendaraan){
                return $this->returnController("error", "failed find data jenis kendaraan");
            }
            Redis::set("jenis_kendaraan:$id", $jenis_kendaraan);
        }

        return $this->returnController("ok", $jenis_kendaraan);
    }

    public function create(Request $req){
        $jenis_kendaraan = jenis_kendaraan::create($req->all());
        $jenis_kendaraan_id= $jenis_kendaraan->id;
        $uuid = HCrypt::encrypt($jenis_kendaraan_id);
        $setuuid = jenis_kendaraan::findOrFail($jenis_kendaraan_id);
        $setuuid->uuid = $uuid;
        $setuuid->update();
        if (!$jenis_kendaraan) {
            return $this->returnController("error", "failed create data jenis kendaraan");
        }
        Redis::del("jenis_kendaraan:all");
        return $this->returnController("ok", $jenis_kendaraan);
    }

    public function update($uuid, Request $req){
        $id = HCrypt::decrypt($uuid);
        if (!$id) {
            return $this->returnController("error", "failed decrypt uuid");
        }

        $jenis_kendaraan = jenis_kendaraan::findOrFail($id);
        if (!$jenis_kendaraan) {
            return $this->returnController("error", "failed find data jenis kendaraan");
        }

        $jenis_kendaraan->fill($req->all())->save();

        Redis::del("jenis_kendaraan:all");
        Redis::set("jenis_kendaraan:$id", $jenis_kendaraan);

        return $this->returnController("ok", $jenis_kendaraan);
    }

    public function delete($uuid){
        $id = HCrypt::decrypt($uuid);
        if (!$id) {
            return $this->returnController("error", "failed decrypt uuid");
        }

        $jenis_kendaraan = jenis_kendaraan::find($id);
        if (!$jenis_kendaraan) {
            return $this->returnController("error", "failed find data jenis kendaraan");
        }

        // Need to check realational
        // If there relation to other data, return error with message, this data has relation to other table(s)

        $delete = $jenis_kendaraan->delete();
        if (!$delete) {
            return $this->returnController("error", "failed delete data jenis kendaraan");
        }

        Redis::del("jenis_kendaraan:all");
        Redis::del("jenis_kendaraan:$id");
        return $this->returnController("ok", "success delete data jenis kendaraan");
    }
}
