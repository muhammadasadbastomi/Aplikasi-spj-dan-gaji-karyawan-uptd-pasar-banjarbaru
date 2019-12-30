<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    protected $fillable = ['uuid', 'golongan', 'keterangan'];
    protected $hidden = ['id'];
}

public function pegawai()
    {
        return $this->HasMany('App\Pegawai');
    }
