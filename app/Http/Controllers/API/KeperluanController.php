<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Keperluan;
use HCrypt;
use Illuminate\Support\Facades\Redis;

class KeperluanController extends APIController
{
    public function get(){
        $keperluan = json_decode(redis::get("keperluan::all"));
        if (!$keperluan) {
            $keperluan = keperluan::all();
            if (!$keperluan) {
                return $this->returnController("error", "failed get keperluan data");
            }
            Redis::set("keperluan:all", $keperluan);            

        }
        return $this->returnController("ok", $keperluan);
    }

    public function find($id){
        $id = HCrypt::decrypt($id);
        if (!$id) {
            return $this->returnController("error", "failed decrypt id");
        }

        $keperluan = Redis::get("keperluan:$id");
        if (!$keperluan) {
            $keperluan = keperluan::find($id);
            if (!$keperluan){
                return $this->returnController("error", "failed find data keperluan");
            }
            Redis::set("keperluan:$id", $keperluan);
        }

        return $this->returnController("ok", $keperluan);
    }
}
