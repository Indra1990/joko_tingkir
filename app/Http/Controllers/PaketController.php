<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Tour;
use App\Driver;
use DateTime;
use App\Booking;
use App\Notification;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Mail\SendEmailBooking;
use Illuminate\Support\Facades\Mail;

class PaketController extends Controller
{

    public function index()
    {
        $tours = Tour::all();
    	return view('/paket_harga',compact('tours'));
    }

    public function createPaket()
    {
    	$tours = Tour::all();
    	return view('/pesan_paket' ,compact('tours'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'tanggal_liburan' => 'required',
		]);

		$request->tours = array_unique(array_diff($request->tours, [0]));
        if(empty($request->tours))
            return redirect('/pesan_paket')->withInput($request->input())->with('tours_error','Paket harus di isi');

        $user = User::find(1);

        $number = mt_rand(10000,99999);

    	$booking = Booking::create([
    		'tanggal_liburan' => $request['tanggal_liburan'],
    		'user_id' =>Auth::user()->id,
            'kode_booking' => $number ,

    	]);

    	$booking->tours()->attach($request->tours);

<<<<<<< HEAD
       //Mail::to($request->user())->send(new SendEmailBooking($booking));
=======
        Notification::create([
            'user_id' => $user->id,
            'booking_id' =>  $booking->id,
            'subject' => 'ada booking dari '. Auth::user()->name,
        ]);

        Mail::to($request->user())->send(new SendEmailBooking($booking));
>>>>>>> origin/development
    	return redirect('/paket_harga')->with('success', 'Berhasil submit pesan paket wisata');

    }

    public function daftarHargaPaket()
    {
        $tours = Tour::all();
        return view('admin.daftar_harga_paket',compact('tours'));
    }

    public function createPaketHarga()
    {
        return view('admin.create_paket_harga');
    }

    public function storeHargaPaket(Request $request)
    {
        $this->validate($request, [
            'kuota' => 'required',
            'harga' => 'required|numeric|min:1',
        ]);

        $tour = Tour::create([
            'kuota' => $request->kuota,
            'harga' => $request->harga,
        ]);

        return redirect('/admin/daftar_harga_paket');

    }

    public function editHargaPaket($id)
    {

        $tour = Tour::findOrFail($id);
        //$drivers = Driver::all();
        return view('admin/edit_paket_harga', compact('tour','drivers'));
    }

    public function updateHargaPaket(Request $request, $id)
    {
        $this->validate($request, [
            'kuota' => 'required',
            'harga' => 'required|numeric|min:1',
        ]);

        $tour = Tour::find($id);
        $tour->update([

                'kuota' => $request->kuota,
                'harga' => $request->harga,
        ]);
        return redirect('/admin/daftar_harga_paket')->with('success','Berhasil update harga paket');
    }
}
