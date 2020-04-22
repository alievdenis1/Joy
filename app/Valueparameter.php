<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valueparameter extends Model
{
    public function products()
    {
      return $this->belongsToMany('App\Product');
    }

    public function parameter()
    {
        return $this->belongsTo('App\Parameter');
    }

    protected $fillable = [
      'valueparameter_id', 'product_id'
  ];
}
