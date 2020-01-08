<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $fillable = [
        'uuid','nopol','merk', 'warna','jenis_kendaraan', 'pegawai_id'
    ];
    protected $hidden = [
        'id', 'pegawai_id'
    ];
    

    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai');
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
