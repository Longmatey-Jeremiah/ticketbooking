<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    protected $fillable = [
        'movie_id', 'start_time', 'end_time','ticket_count','date','price'
    ];
    public function movie(){
        $this->belongsTo('App\movie');
    }
}
