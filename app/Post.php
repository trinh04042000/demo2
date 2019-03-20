<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function catogory(){
        return $this->belongsTo('App\Catogory');
    }

}
