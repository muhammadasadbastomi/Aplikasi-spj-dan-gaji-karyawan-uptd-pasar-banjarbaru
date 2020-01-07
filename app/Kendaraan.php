<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $fillable = [
        'uuid','nopol','merk', 'warna','jenis_id', 'pegawai_id'
    ];
    protected $hidden = [
        'id', 'jenis_kendaraan_id', 'pegawai_id'
    ];

    public function jenis_kendaraan()
    {
        return $this->belongsTo('App\Jenis_kendaraan');
    }

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
