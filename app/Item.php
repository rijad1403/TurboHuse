<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function manufacturer()
    {
        return $this->belongsTo('App\Manufacturer');
    }
}
