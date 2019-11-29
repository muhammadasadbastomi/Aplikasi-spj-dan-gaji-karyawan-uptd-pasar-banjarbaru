<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pajak extends Model
{
    protected $fillable = ['uuid','nama', 'besaran'];
    protected $hidden = ['id'];

    public function keperluan(){
        return $this->HasMany('App\Keperluan');
      }
}
