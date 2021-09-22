<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class booked_ticket extends Model
{
    public function user(){
        return $this->hasOne('App\User');
    }
    public function ticket(){
        return $this->hasOne('App\ticket');
    }
}
