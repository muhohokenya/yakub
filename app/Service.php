<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    public function room()
    {
       return $this->belongsToMany('App\Room');
    }
}
