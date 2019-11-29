<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use HCrypt;

class Golongan extends Model
{
    protected $fillable = ['golongan', 'keterangan'];
   
}
