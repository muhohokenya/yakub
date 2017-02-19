<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //

    public function services()
    {
       return $this->belongsToMany('App\Service');
    }


     public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
