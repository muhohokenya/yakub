<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    protected $table = 'booking_user';


    public function user()
    {
        return $this->belongsToMany('App\User','user_id');
    }
}
