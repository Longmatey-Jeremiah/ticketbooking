<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class client_info extends Model
{
    public function user(){
        return $this->hasOne('App\User');
    }
}
