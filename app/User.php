<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name', 'email', 'password',
        'phone', 'is_admin', 'is_agent',
        'agency_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function agency()
    {
        return $this->belongsTo('App\Agency');
    }

    public function tours()
    {
        return $this->belongsToMany('App\Tour', 'tours_users');
    }

    public function status()
    {
        if($this->is_admin) {
            return 'admin';
        } elseif($this->is_agent) {
            return 'agent';
        } else {
            return 'user';
        }
    }
}
