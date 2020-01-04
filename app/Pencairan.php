<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pencairan extends Model
{
    public function rincian()
    {
    	return $this->belongsToMany('App\Rincian');
    }
}
