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
