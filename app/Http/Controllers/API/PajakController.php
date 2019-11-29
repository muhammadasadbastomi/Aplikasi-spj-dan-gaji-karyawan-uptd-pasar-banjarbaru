<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pajak;
use HCrypt;
use Illuminate\Support\Facades\Redis;

class PajakController extends APIController
{
    public function get(){
        $pajak = json_decode(redis::get("pajak::all"));
        if (!$pajak) {
            $pajak = pajak::all();
            if (!$pajak) {
                return $this->returnController("error", "failed get pajak data");
            }
            Redis::set("pajak:all", $pajak);            

        }
        return $this->returnController("ok", $pajak);
    }

    public function find($id){
        $id = HCrypt::decrypt($id);
        if (!$id) {
            return $this->returnController("error", "failed decrypt id");
        }

        $pajak = Redis::get("pajak:$id");
        if (!$pajak) {
            $pajak = pajak::find($id);
            if (!$pajak){
                return $this->returnController("error", "failed find data pajak");
            }
            Redis::set("pajak:$id", $pajak);
        }

        return $this->returnController("ok", $pajak);
    }

    public function create(Request $req){
        $pajak = pajak::create($req->all());
        $pajak_id= $pajak->id;
        $uuid = HCrypt::encrypt($pajak_id);
        $setuuid = golongan::findOrFail($pajak_id);
        $setuuid->uuid = $uuid;
        $setuuid->update();
        if (!$pajak) {
            return $this->returnController("error", "failed create data pajak");
        }
        Redis::del("pajak:all");
        return $this->returnController("ok", $pajak);
    }

    public function update($id, Request $req){
        $id = HCrypt::decrypt($id);
        if (!$id) {
            return $this->returnController("error", "failed decrypt id");
        }

        $pajak = pajak::find($id);
        if (!$pajak) {
            return $this->returnController("error", "failed find data pajak");
        }

        $pajak->nama     = $req->nama;
        $pajak->besaran    = $req->besaran;
        $pajak->update();

        if (!$pajak) {
            return $this->returnController("error", "failed find data pajak");
        }

        Redis::del("pajak:all");
        Redis::set("pajak:$id", $pajak);

        return $this->returnController("ok", $pajak);
    }

    public function delete($id){
        $id = HCrypt::decrypt($id);
        if (!$id) {
            return $this->returnController("error", "failed decrypt id");
        }

        $pajak = pajak::find($id);
        if (!$pajak) {
            return $this->returnController("error", "failed find data pajak");
        }

        // Need to check realational
        // If there relation to other data, return error with message, this data has relation to other table(s)

        $delete = $pajak->delete();
        if (!$delete) {
            return $this->returnController("error", "failed delete data pajak");
        }

        Redis::del("pajak:all");
        Redis::del("pajak:$id");

        return $this->returnController("ok", "success delete data pajak");
    }
}
