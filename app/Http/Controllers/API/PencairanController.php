<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pencairan;
use App\Item;
use HCrypt;
use Illuminate\Support\Facades\Redis;

class PencairanController extends APIController
{
    public function get($id){
        $rincian = json_decode(redis::get("rincian::all"));
        if (!$rincian) {
            $rincian = rincian::all();
            if (!$rincian) {
                return $this->returnController("error", "failed get rincian data");
            }
            Redis::set("rincian:all", $rincian);            

        }
        return $this->returnController("ok", $rincian);
    }

    public function find($uuid){
        $id = HCrypt::decrypt($uuid);
        if (!$id) {
            return $this->returnController("error", "failed decrypt uuid");
        }

        $rincian = Redis::get("rincian:$id");
        if (!$rincian) {
            $rincian = rincian::find($id);
            if (!$rincian){
                return $this->returnController("error", "failed find data rincian");
            }
            Redis::set("rincian:$id", $rincian);
        }

        return $this->returnController("ok", $rincian);
    }

    public function create(Request $req){
        $id = $req->id_pencairan;
        $total_harga = rincian::where('pencairan_id',$id)->get()->sum('total_harga_item');
        $pencairan = pencairan::findOrFail($id);

        $pencairan->total = $total_harga;
        
        $pencairan->update();

        if (!$pencairan) {
            return $this->returnController("error", "failed update data pencairan");
        }
        Redis::del("pencairan:all");
        Redis::set("pencairan:$id", $pencairan);
        return $this->returnController("ok", $rincian);
    }

    

    public function update($uuid, Request $req){
        $id = HCrypt::decrypt($uuid);
        if (!$id) {
            return $this->returnController("error", "failed decrypt uuid");
        }

        $rincian = rincian::findOrFail($id);
        if (!$rincian) {
            return $this->returnController("error", "failed find data rincian");
        }

        $rincian->rincian     = $req->rincian;
        $rincian->keterangan    = $req->keterangan;
        $rincian->update();
        if (!$rincian) {
            return $this->returnController("error", "failed find data rincian");
        }

        Redis::del("rincian:all");
        Redis::set("rincian:$id", $rincian);

        return $this->returnController("ok", $rincian);
    }

    public function delete($uuid){
        $id = HCrypt::decrypt($uuid);
        if (!$id) {
            return $this->returnController("error", "failed decrypt uuid");
        }

        $rincian = rincian::find($id);
        if (!$rincian) {
            return $this->returnController("error", "failed find data rincian");
        }

        // Need to check realational
        // If there relation to other data, return error with message, this data has relation to other table(s)

        $delete = $rincian->delete();
        if (!$delete) {
            return $this->returnController("error", "failed delete data rincian");
        }

        Redis::del("rincian:all");
        Redis::del("rincian:$id");
        return $this->returnController("ok", "success delete data rincian");
    }
}
