<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
  	protected $fillable = [
        'kuota','harga', 
    ];

    public function bookings()
    {
    	return $this->belongsToMany('App\Booking');
    }

    
     
}
