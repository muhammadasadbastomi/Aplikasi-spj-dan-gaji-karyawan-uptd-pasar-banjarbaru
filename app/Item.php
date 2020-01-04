<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['uuid','nama', 'satuan', 'harga' , 'keperluan'];
    protected $hidden = ['id'];

    // public function kendaraan()
    // {
    //     return $this->HasOne('App\Kendaraan');
    // }

    public function rincian()
    {
    	return $this->belongsToMany('App\Rincian');
    }
}
