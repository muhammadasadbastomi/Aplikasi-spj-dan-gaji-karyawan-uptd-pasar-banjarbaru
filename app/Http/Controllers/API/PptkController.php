<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pptk;
use HCrypt;
use Illuminate\Support\Facades\Redis;

class PptkController extends APIController
{
    public function get(){
        $pptk = json_decode(redis::get("pptk::all"));
        if (!$pptk) {
            $pptk = pptk::all();
            if (!$pptk) {
                return $this->returnController("error", "failed get pptk data");
            }
            Redis::set("pptk:all", $pptk);
        }
        return $this->returnController("ok", $pptk);
    }

    public function find($uuid){
        $id = HCrypt::decrypt($uuid);
        if (!$id) {
            return $this->returnController("error", "failed decrypt uuid");
        }
        $pptk = Redis::get("pptk:$id");
        if (!$pptk) {
            $pptk = pptk::find($id);
            if (!$pptk){
                return $this->returnController("error", "failed find data pptk");
            }
            Redis::set("pptk:$id", $pptk);
        }
        return $this->returnController("ok", $pptk);
    }

    public function create(Request $req){
        $pptk = pptk::create($req->all());
        
        //set uuid
        $pptk_id = $pptk->id;
        $uuid = HCrypt::encrypt($pptk_id);
        $setuuid = pptk::findOrFail($pptk_id);
        $setuuid->uuid = $uuid;
        $setuuid->update();
        if (!$pptk) {
            return $this->returnController("error", "failed create data pptk");
        }
        Redis::del("pptk:all");
        Redis::set("pptk:all", $pptk);
        return $this->returnController("ok", $pptk);
    }

    public function update($uuid, Request $req){
        $id = HCrypt::decrypt($uuid);
        if (!$id) {
            return $this->returnController("error", "failed decrypt uuid");
        }
       
        $pptk = pptk::findOrFail($id);

        if (!$pptk) {
            return $this->returnController("error", "failed find data pptk");
        }

        $pptk->fill($req->all())->save();

        Redis::del("pptk:all");
        Redis::set("pptk:$id", $pptk);
        return $this->returnController("ok", $pptk);
    }

    public function delete($uuid){
        $id = HCrypt::decrypt($uuid);
        if (!$id) {
            return $this->returnController("error", "failed decrypt uuid");
        }
        $pptk = pptk::find($id);
        if (!$pptk) {
            return $this->returnController("error", "failed find data pptk");
        }
        // Need to check realational
        // If there relation to other data, return error with message, this data has relation to other table(s)
        $delete = $pptk->delete();
        if (!$delete) {
            return $this->returnController("error", "failed delete data pptk");
        }
        Redis::del("pptk:all");
        Redis::del("pptk:$id");
        return $this->returnController("ok", "success delete data pptk");
    }
}
