<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rincian extends Model
{
    protected $hidden = [
        'id','item_id','pencairan_id',
    ];

    public function item()
    {
        return $this->belongsTo('App\Item');
    }
}
