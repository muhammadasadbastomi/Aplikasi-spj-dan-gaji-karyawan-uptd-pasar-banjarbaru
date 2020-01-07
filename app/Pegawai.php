<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $fillable = [
        'uuid','nama','NIP', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'jk','agama',
        'status_pegawai', 'status_kawin', 'golongan_darah','foto','golongan_id', 'jabatan_id'
    ];
    protected $hidden = [
        'id', 'golongan_id', 'jabatan_id'
    ];

    public function golongan()
    {
        return $this->belongsTo('App\Golongan');
    }

    public function jabatan()
    {
        return $this->belongsTo('App\Jabatan');
    }

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
