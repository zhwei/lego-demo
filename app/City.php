<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function streets()
    {
        return $this->hasMany(Street::class);
    }
}
