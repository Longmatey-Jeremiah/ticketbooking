<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class movie extends Model
{
    //protected $fillables = ['name','description','price','image','category_id'];
    //movies belong to a particular category.
    public function category()
    {
        return $this->belongsTo('App\category');
    }
    public function ticket(){
        return $this->hasMany('App\ticket');
    }
}
