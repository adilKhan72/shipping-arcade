<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
      public function company()
    {
        return $this->hasMany('App\Company');
    }

}
