<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rincian;
use App\Item;
use HCrypt;
use Illuminate\Support\Facades\Redis;

class RincianController extends APIController
{
    public function get($id){
        $rincian = json_decode(redis::get("rincian::all"));
        if (!$rincian) {
            $rincian = rincian::with('item')->where('pencairan_id',$id)->get();
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
        $item_id = HCrypt::decrypt($req->item_id);
        $item = item::findOrFail($item_id);
        $total_harga_item = $req->volume * $item->harga;

        $rincian = new rincian;
        if ($item->keperluan == "Belanja Oprasional Transport Roda 2" || "Belanja Oprasional Transport Roda 4") 
        {
            $rincian->kendaraan_id = $req->kendaraan_id;    
            $rincian->tanggal_pengisian = $req->tanggal_pengisian;  
        }
        $rincian->pencairan_id = $req->pencairan_id;
        $rincian->item_id = $item_id;
        $rincian->volume = $req->volume;
        $rincian->total_harga_item = $total_harga_item;
        $rincian->save();

        $rincian_id= $rincian->id;
        $uuid = HCrypt::encrypt($rincian_id);
        $setuuid = rincian::findOrFail($rincian_id);
        $setuuid->uuid = $uuid;

        $setuuid->update();
        if (!$rincian) {
            return $this->returnController("error", "failed create data rincian");
        }
        Redis::del("rincian:all");
        Redis::set("rincian:all",$rincian);
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
