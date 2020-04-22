<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{   

    public function valueparameters()
    {
        return $this->hasMany('App\Valueparameter');
    }
}
