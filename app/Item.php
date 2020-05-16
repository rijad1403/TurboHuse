<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Image;

class Item extends Model
{
    public function manufacturer()
    {
        return $this->belongsTo('App\Manufacturer');
    }

    public function buyings()
    {
        return $this->belongsToMany('App\Buying')->using('App\BuyingItem');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
