<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $fillable = [
        'name', 'agency_id', 'country',
        'hotel', 'meal_service', 'city',
        'room_capacity', 'price',
        'start_date', 'end_date'
    ];

    public function agency()
    {
       return $this->belongsTo('App\Agency');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'tours_users')->withPivot('status');
    }
}
