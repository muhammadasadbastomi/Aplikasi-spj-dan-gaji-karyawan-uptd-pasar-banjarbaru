<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $fillable = [
        'uuid','nama','NIP', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'jk','agama',
        'status_pegawai', 'status_kawin', 'golongan_darah','foto','golongan', 'jabatan'
    ];
    protected $hidden = [
        'id', 
    ];


    public function kendaraan()
    {
        return $this->HasOne('App\Kendaraan');
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
