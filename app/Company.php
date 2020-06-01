<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
    public function city()
    {
        return $this->belongsTo('App\City');
    }
    public function lead_country()
    {
        return $this->belongsTo('App\Country', 'leads_from_countries_ids');
    }
    public function lead_city()
    {
        return $this->belongsTo('App\City', 'leads_from_cities_ids');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
