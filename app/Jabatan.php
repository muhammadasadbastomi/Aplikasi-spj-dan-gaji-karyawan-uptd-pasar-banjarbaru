<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $fillable = [
        'uuid','kode_jabatan', 'jabatan','keterangan'
    ];

    protected $hidden = [
        'id'
    ];

    public function pegawai()
    {
        return $this->HasMany('App\Pegawai');
    }
}
