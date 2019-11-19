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
        $golongan = Redis::get("golongan:all");
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
        $create = golongan::create($req->all());
        if (!$create) {
            return $this->returnController("error", "failed create data golongan");
        }
        Redis::del("golongan:all");
        return $this->returnController("ok", $create);
    }

    public function update($uuid, Request $req){
        $id = HCrypt::decrypt($uuid);
        if (!$id) {
            return $this->returnController("error", "failed decrypt uuid");
        }

        $golongan = golongan::find($id);
        if (!$golongan) {
            return $this->returnController("error", "failed find data golongan");
        }

        $update = $golongan->update($req->all());
        if (!$update) {
            return $this->returnController("error", "failed find data golongan");
        }

        Redis::del("golongan:all");
        Redis::set("golongan:$id", $update);

        return $this->returnController("ok", $update);
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
