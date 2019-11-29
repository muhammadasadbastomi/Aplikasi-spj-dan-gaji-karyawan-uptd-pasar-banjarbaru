<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pajak extends Model
{
    protected $fillable = ['nama', 'besaran'];
    // protected $hidden = ['id'];
}
