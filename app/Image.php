<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;

class Image extends Model
{
    //
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
