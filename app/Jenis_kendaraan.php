<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis_kendaraan extends Model
{
    protected $fillable = ['uuid','kode_jenis', 'jenis'];
    protected $hidden = ['id'];

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
