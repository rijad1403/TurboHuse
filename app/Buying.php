<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buying extends Model
{
    public function items()
    {
        return $this->belongsToMany('App\Item')->using('App\BuyingItem')->withPivot('quantity');
    }
}
