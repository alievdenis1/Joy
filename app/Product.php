<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Product extends Model
{
  use Sluggable;

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function valueparameters()
    {
      return $this->belongsToMany('App\Valueparameter');
    }

    public function city()
    {
      return $this->belongsTo('App\City');
    }

    public function gender()
    {
      return $this->belongsTo('App\Gender');
    }

    protected $fillable = [
      'name', 'description', 'number', 'price', 'user_id', 'city_id', 'minage', 'maxage', 'gender_id','imgPath'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    
}
