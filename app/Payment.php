<?php

namespace App;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
	protected $fillable = [
        'nama_bank','atas_nama', 'subject', 'img','tgl_transfer','user_id', 'booking_id'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function booking()
    {
    	return $this->belongsTo('App\Booking');
    }

    public function getSubjectAttribute($subject)
    {
        return ucwords($subject);
    }
}
