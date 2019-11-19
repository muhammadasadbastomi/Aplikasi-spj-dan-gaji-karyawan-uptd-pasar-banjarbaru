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
        // $pajak = Redis::get("pajak:all");
        if (!$pajak) {
            $pajak = pajak::all();
            if (!$pajak) {
                return $this->returnController("error", "failed get pajak data");
            }
            // dd($pajak);
            Redis::set("pajak:all", $pajak);            

        }
        return $this->returnController("ok", $pajak);
    }

    public function find($id){
        // $id = HCrypt::decrypt($id);
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
        $create = pajak::create($req->all());
        if (!$create) {
            return $this->returnController("error", "failed create data pajak");
        }
        Redis::del("pajak:all");
        return $this->returnController("ok", $create);
    }

    public function update($id, Request $req){
        // $id = HCrypt::decrypt($id);
        if (!$id) {
            return $this->returnController("error", "failed decrypt id");
        }

        $pajak = pajak::find($id);
        if (!$pajak) {
            return $this->returnController("error", "failed find data pajak");
        }

        $update = $pajak->update($req->all());
        if (!$update) {
            return $this->returnController("error", "failed find data pajak");
        }

        Redis::del("pajak:all");
        Redis::set("pajak:$id", $update);

        return $this->returnController("ok", $update);
    }

    public function delete($id){
        // $id = HCrypt::decrypt($id);
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
