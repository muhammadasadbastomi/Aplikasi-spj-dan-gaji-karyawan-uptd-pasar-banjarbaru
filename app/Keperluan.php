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
