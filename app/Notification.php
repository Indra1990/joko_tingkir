<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'subject', 'user_id','booking_id', 'seen',
    ];

    public function user()
    {
    	return $this->belongTo('App\User');
    }

    public function booking()
    {
    	return $this->belongTo('App\Booking');
    }
}
