<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
     protected $fillable = [
        'tanggal_liburan', 'kode_booking','status', 'user_id',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function tours()
    {
    	return $this->belongsToMany('App\Tour');

    }

    public function payment()
    {
        return $this->hasOne('App\Payment');
    }

    public function getStatusAttribute($status)
    {
        return ucwords($status);
    }
}
