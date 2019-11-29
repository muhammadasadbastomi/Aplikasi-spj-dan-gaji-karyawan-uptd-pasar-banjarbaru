<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keperluan extends Model
{
    protected $fillable = ['uuid','keperluan'];
    protected $hidden = ['id','pajak_id'];

    public function pajak(){
        return $this->HasOne('App\Pajak');
      }
}
