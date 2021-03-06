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
