<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        if ($this->role == 2) {
            return true;
        }

        return false;
    }

    public function bookings()
    {
        return $this->hasMany('App\Booking');
    }

    public function notifications()
    {
        return $this->hasMany('App\Notification');
    }

    public function payment()
    {
        return $this->hasOne('App\Payment');
    }

    public function getNameAttribute($name)
    {
        return ucwords($name);
    }

    public function isOnline()
    {
    return Cache::has('user-is-online-' . $this->id);
    }

}
