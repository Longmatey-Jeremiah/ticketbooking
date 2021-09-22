<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = [
        'name', 'description', 'image'
    ];
    public function movie(){
        return $this->hasMany('App\movie');
    }
}
