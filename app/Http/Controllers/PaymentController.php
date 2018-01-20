<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Booking;
use App\Payment;
use App\Tour;
use Image;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function confirm($id)
    {
    	$booking = Booking::find($id);
    	return view('konfirmasi',compact('booking'));
    }

    public function store(Request $request ,$id)
    {
    	$this->validate($request,[
    			'nama_bank' => 'required|min:3',
          'atas_nama' => 'required|min:3',
          'tgl_transfer' => 'required',
    			'subject' => 'required',
          'img' => 'required|image|mimes:jpeg,png,jpg|max:300',
    		]);

    	$booking = Booking::findOrFail($id);

        if ($booking->payment()->exists()) {

           return back()->withInput($request->input());
        }

        else{
      
        if($request->hasFile('img')){
            $img = $request->file('img');
            $filename = time() . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(300, 300)->save( public_path('/transfers/images/' . $filename ) );
            }

          	$payment = Payment::create([
          		'nama_bank' =>$request->nama_bank,
              'atas_nama' =>$request->atas_nama,
              'tgl_transfer' => $request->tgl_transfer,
          		'subject' => $request->subject,
              'img' => $filename,
          		'booking_id'=> $id,
          		'user_id' => Auth::user()->id,
          	   ]);
            }


        return redirect('/user/history_booking/'.$booking->user->id)->with('success','Berhasil Konfirmasi Pembayaran');
    }


}
