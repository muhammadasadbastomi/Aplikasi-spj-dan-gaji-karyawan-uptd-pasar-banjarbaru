<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Item;
use HCrypt;
use Illuminate\Support\Facades\Redis;

class ItemController extends APIController
{
    public function get(){
        $item = json_decode(redis::get("item::all"));
        if (!$item) {
            $item = item::all();
            if (!$item) {
                return $this->returnController("error", "failed get jenis kendaraan data");
            }
            Redis::set("item:all", $item);            

        }
        return $this->returnController("ok", $item);
    }

    public function find($uuid){
        $id = HCrypt::decrypt($uuid);
        if (!$id) {
            return $this->returnController("error", "failed decrypt uuid");
        }

        $item = Redis::get("item:$id");
        if (!$item) {
            $item = item::find($id);
            if (!$item){
                return $this->returnController("error", "failed find data jenis kendaraan");
            }
            Redis::set("item:$id", $item);
        }

        return $this->returnController("ok", $item);
    }

    public function create(Request $req){
        $item = item::create($req->all());
        $item_id= $item->id;
        $uuid = HCrypt::encrypt($item_id);
        $setuuid = item::findOrFail($item_id);
        $setuuid->uuid = $uuid;
        $setuuid->update();
        if (!$item) {
            return $this->returnController("error", "failed create data jenis kendaraan");
        }
        Redis::del("item:all");
        return $this->returnController("ok", $item);
    }

    public function update($uuid, Request $req){
        $id = HCrypt::decrypt($uuid);
        if (!$id) {
            return $this->returnController("error", "failed decrypt uuid");
        }

        $item = item::findOrFail($id);
        if (!$item) {
            return $this->returnController("error", "failed find data jenis kendaraan");
        }

        $item->fill($req->all())->save();

        Redis::del("item:all");
        Redis::set("item:$id", $item);

        return $this->returnController("ok", $item);
    }

    public function delete($uuid){
        $id = HCrypt::decrypt($uuid);
        if (!$id) {
            return $this->returnController("error", "failed decrypt uuid");
        }

        $item = item::find($id);
        if (!$item) {
            return $this->returnController("error", "failed find data jenis kendaraan");
        }

        // Need to check realational
        // If there relation to other data, return error with message, this data has relation to other table(s)

        $delete = $item->delete();
        if (!$delete) {
            return $this->returnController("error", "failed delete data jenis kendaraan");
        }

        Redis::del("item:all");
        Redis::del("item:$id");
        return $this->returnController("ok", "success delete data jenis kendaraan");
    }
}
