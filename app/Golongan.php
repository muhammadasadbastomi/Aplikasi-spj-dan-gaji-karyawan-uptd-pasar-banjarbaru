<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use HCrypt;

class Golongan extends Model
{
    protected $fillable = ['golongan', 'keterangan'];
    protected $hidden = ['id'];
    protected $appends = array('uuid');

    public function getUuidAttribute()
    {
        return HCrypt::encrypt($this->id);
    }
}
