<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pptk extends Model
{
    protected $fillable = [
        'uuid','nama','NIP', 'jabatan'
    ];
    protected $hidden = [
        'id', 
    ];
}
