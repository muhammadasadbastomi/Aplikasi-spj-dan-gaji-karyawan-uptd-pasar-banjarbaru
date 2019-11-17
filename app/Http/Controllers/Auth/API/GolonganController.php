<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Golongan;
use HCrypt;
use Redis;

class GolonganController extends Controller
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
}
