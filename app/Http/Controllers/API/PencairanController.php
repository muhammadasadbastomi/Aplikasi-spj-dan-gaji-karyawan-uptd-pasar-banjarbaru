<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pencairan;
use HCrypt;
use Illuminate\Support\Facades\Redis;

class PencairanController extends APIController
{
    public function get(){
        $pencairan = json_decode(redis::get("pencairan::all"));
        if (!$pencairan) {
            $pencairan = pencairan::all();
            if (!$pencairan) {
                return $this->returnController("error", "failed get pencairan data");
            }
            Redis::set("pencairan:all", $pencairan);            

        }
        return $this->returnController("ok", $pencairan);
    }

    public function find($uuid){
        $id = HCrypt::decrypt($uuid);
        if (!$id) {
            return $this->returnController("error", "failed decrypt uuid");
        }

        $pencairan = Redis::get("pencairan:$id");
        if (!$pencairan) {
            $pencairan = pencairan::find($id);
            if (!$pencairan){
                return $this->returnController("error", "failed find data pencairan");
            }
            Redis::set("pencairan:$id", $pencairan);
        }

        return $this->returnController("ok", $pencairan);
    }

    public function create(Request $req){
        $user_id = Auth::id();
        $pencairan = new pencairan;
        $pencairan->user_id = $user_id;
        $pencairan->save();

        $pencairan_id= $pencairan->id;
        $uuid = HCrypt::encrypt($pencairan_id);
        $setuuid = pencairan::findOrFail($pencairan_id);
        $setuuid->uuid = $uuid;
        $setuuid->update();
        if (!$pencairan) {
            return $this->returnController("error", "failed create data pencairan");
        }
        Redis::del("pencairan:all");
        return $this->returnController("ok", $pencairan);
    }

    

    public function update($uuid, Request $req){
        $id = HCrypt::decrypt($uuid);
        if (!$id) {
            return $this->returnController("error", "failed decrypt uuid");
        }

        $pencairan = pencairan::findOrFail($id);
        if (!$pencairan) {
            return $this->returnController("error", "failed find data pencairan");
        }

        $pencairan->pencairan     = $req->pencairan;
        $pencairan->keterangan    = $req->keterangan;
        $pencairan->update();
        if (!$pencairan) {
            return $this->returnController("error", "failed find data pencairan");
        }

        Redis::del("pencairan:all");
        Redis::set("pencairan:$id", $pencairan);

        return $this->returnController("ok", $pencairan);
    }

    public function delete($uuid){
        $id = HCrypt::decrypt($uuid);
        if (!$id) {
            return $this->returnController("error", "failed decrypt uuid");
        }

        $pencairan = pencairan::find($id);
        if (!$pencairan) {
            return $this->returnController("error", "failed find data pencairan");
        }

        // Need to check realational
        // If there relation to other data, return error with message, this data has relation to other table(s)

        $delete = $pencairan->delete();
        if (!$delete) {
            return $this->returnController("error", "failed delete data pencairan");
        }

        Redis::del("pencairan:all");
        Redis::del("pencairan:$id");
        return $this->returnController("ok", "success delete data pencairan");
    }
}
