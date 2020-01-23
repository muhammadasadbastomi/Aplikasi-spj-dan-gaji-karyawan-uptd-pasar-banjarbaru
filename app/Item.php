<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['uuid','nama', 'satuan', 'harga' , 'keperluan','tahun_berlaku'];
    protected $hidden = ['id'];

    // public function kendaraan()
    // {
    //     return $this->HasOne('App\Kendaraan');
    // }

    public function rincian()
    {
    	return $this->belongsToMany('App\Rincian');
    }

    public function getCreatedAtAttribute()
    {
    return \Carbon\Carbon::parse($this->attributes['created_at'])
       ->format('d, M Y');
    }

    public function getUpdatedAtAttribute()
    {
    return \Carbon\Carbon::parse($this->attributes['updated_at'])
       ->diffForHumans();
    }
}
