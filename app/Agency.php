<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    protected $fillable = ['name'];

    public function users()
    {
       return $this->hasMany('App\User');
    }

    public function tours()
    {
        return $this->hasMany('App\Tour');
    }
}
