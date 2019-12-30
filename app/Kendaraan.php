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
}
