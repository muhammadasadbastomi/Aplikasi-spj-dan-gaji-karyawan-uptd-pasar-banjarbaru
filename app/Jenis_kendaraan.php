<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis_kendaraan extends Model
{
    protected $fillable = ['uuid','kode_jenis', 'jenis'];
    protected $hidden = ['id'];
}
